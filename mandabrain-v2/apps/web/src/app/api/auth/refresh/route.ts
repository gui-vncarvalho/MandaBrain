import { cookies } from 'next/headers';
import { NextResponse } from 'next/server';
import { createSessionToken, parseSessionToken, SESSION_COOKIE_NAME } from '@/features/auth/session';

export async function POST() {
  const cookieStore = await cookies();
  const token = cookieStore.get(SESSION_COOKIE_NAME)?.value;

  if (!token) {
    return NextResponse.json({ error: 'Não autenticado.' }, { status: 401 });
  }

  const user = parseSessionToken(token);

  if (!user) {
    return NextResponse.json({ error: 'Sessão inválida.' }, { status: 401 });
  }

  try {
    const response = NextResponse.json({ user, refreshed: true }, { status: 200 });

    response.cookies.set({
      name: SESSION_COOKIE_NAME,
      value: createSessionToken(user),
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
