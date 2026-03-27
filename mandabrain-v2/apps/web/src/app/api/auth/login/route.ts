import { NextResponse } from 'next/server';
import { createSessionToken, SESSION_COOKIE_NAME } from '@/features/auth/session';
import { validateLoginInput } from '@/features/auth/validation';
import type { AuthUser, LoginInput, LoginSuccess, UserRole } from '@/features/auth/types';

function inferRole(email: string): UserRole {
  if (email.includes('admin')) return 'admin';
  if (email.includes('prof')) return 'teacher';
  return 'student';
}

export function buildLoginSuccess(email: string): LoginSuccess {
  const user: AuthUser = {
    id: 1,
    name: email.split('@')[0] || 'Usuário',
    role: inferRole(email)
  };

  return { user };
}

export async function POST(request: Request) {
  const body = (await request.json()) as LoginInput;
  const errors = validateLoginInput(body);

  if (errors.length > 0) {
    return NextResponse.json({ error: errors[0] }, { status: 400 });
  }

  try {
    const payload = buildLoginSuccess(body.email);
    const response = NextResponse.json(payload, { status: 200 });

    response.cookies.set({
      name: SESSION_COOKIE_NAME,
      value: createSessionToken(payload.user),
      httpOnly: true,
      sameSite: 'lax',
      path: '/',
      secure: process.env.NODE_ENV === 'production',
      maxAge: 60 * 60 * 12
    });

    return response;
  } catch (error) {
    return NextResponse.json(
      {
        error:
          error instanceof Error
            ? error.message
            : 'Falha de configuração da sessão. Verifique SESSION_SECRET.'
      },
      { status: 500 }
    );
  }
}
