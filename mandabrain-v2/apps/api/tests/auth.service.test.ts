import { describe, expect, it } from 'vitest';
import { JwtService } from '@nestjs/jwt';
import { AuthService } from '../src/auth/auth.service';

describe('AuthService', () => {
  const authService = new AuthService(new JwtService({}));

  it('realiza login com usuário mock válido', () => {
    const result = authService.login('admin@mandabrain.com', '12345678');

    expect(result.user.role).toBe('admin');
    expect(result.accessToken).toBeTruthy();
    expect(result.refreshToken).toBeTruthy();
  });

  it('renova refresh token válido', () => {
    const loginResult = authService.login('aluno@mandabrain.com', '12345678');
    const refreshed = authService.refresh(loginResult.refreshToken);

    expect(refreshed.accessToken).toBeTruthy();
    expect(refreshed.refreshToken).toBeTruthy();
    expect(refreshed.refreshToken).not.toBe(loginResult.refreshToken);
  });

  it('remove refresh token no logout', () => {
    const loginResult = authService.login('prof.julia@mandabrain.com', '12345678');
    authService.logout(loginResult.refreshToken);

    expect(() => authService.refresh(loginResult.refreshToken)).toThrowError('Refresh token inválido.');
  });
});
