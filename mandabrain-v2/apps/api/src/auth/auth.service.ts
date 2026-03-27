import { Injectable, UnauthorizedException } from '@nestjs/common';
import { JwtService } from '@nestjs/jwt';
import { compareSync, hashSync } from 'bcryptjs';
import type { UserRecord } from '../common/types';

export type SessionPayload = {
  sub: number;
  email: string;
  role: UserRecord['role'];
};

export type AuthTokens = {
  accessToken: string;
  refreshToken: string;
};

@Injectable()
export class AuthService {
  private readonly users = new Map<string, UserRecord>();
  private readonly refreshStore = new Map<string, number>();

  constructor(private readonly jwtService: JwtService) {
    this.seedUsers();
  }

  login(email: string, password: string) {
    const user = this.users.get(email.toLowerCase());

    if (!user || !compareSync(password, user.passwordHash)) {
      throw new UnauthorizedException('Credenciais inválidas.');
    }

    const tokens = this.generateTokens(user);
    this.refreshStore.set(tokens.refreshToken, user.id);

    return {
      user: {
        id: user.id,
        email: user.email,
        name: user.name,
        role: user.role
      },
      ...tokens
    };
  }

  refresh(refreshToken: string): AuthTokens {
    const userId = this.refreshStore.get(refreshToken);

    if (!userId) {
      throw new UnauthorizedException('Refresh token inválido.');
    }

    const user = Array.from(this.users.values()).find((entry) => entry.id === userId);
    if (!user) {
      throw new UnauthorizedException('Usuário não encontrado.');
    }

    this.refreshStore.delete(refreshToken);
    const tokens = this.generateTokens(user);
    this.refreshStore.set(tokens.refreshToken, user.id);

    return tokens;
  }

  logout(refreshToken: string) {
    this.refreshStore.delete(refreshToken);
    return { ok: true };
  }

  private generateTokens(user: UserRecord): AuthTokens {
    const payload: SessionPayload = {
      sub: user.id,
      email: user.email,
      role: user.role
    };

    return {
      accessToken: this.jwtService.sign(payload, {
        secret: process.env.JWT_ACCESS_SECRET ?? 'access-dev-secret-change-me',
        expiresIn: '15m'
      }),
      refreshToken: this.jwtService.sign(payload, {
        secret: process.env.JWT_REFRESH_SECRET ?? 'refresh-dev-secret-change-me',
        expiresIn: '7d'
      })
    };
  }

  private seedUsers() {
    const defaultPassword = hashSync('12345678', 10);

    const base: UserRecord[] = [
      {
        id: 1,
        email: 'admin@mandabrain.com',
        name: 'Admin MandaBrain',
        role: 'admin',
        passwordHash: defaultPassword
      },
      {
        id: 2,
        email: 'prof.julia@mandabrain.com',
        name: 'Prof Julia',
        role: 'teacher',
        passwordHash: defaultPassword
      },
      {
        id: 3,
        email: 'aluno@mandabrain.com',
        name: 'Aluno Demo',
        role: 'student',
        passwordHash: defaultPassword
      }
    ];

    for (const user of base) {
      this.users.set(user.email.toLowerCase(), user);
    }
  }
}
