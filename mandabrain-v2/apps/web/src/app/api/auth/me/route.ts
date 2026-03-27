import { cookies } from 'next/headers';
import { NextResponse } from 'next/server';
import { parseSessionToken, SESSION_COOKIE_NAME } from '@/features/auth/session';

export async function GET() {
  const cookieStore = await cookies();
  const token = cookieStore.get(SESSION_COOKIE_NAME)?.value;

  if (!token) {
    return NextResponse.json({ error: 'Não autenticado.' }, { status: 401 });
  }

  const user = parseSessionToken(token);

  if (!user) {
    return NextResponse.json({ error: 'Sessão inválida.' }, { status: 401 });
  }

  return NextResponse.json({ user }, { status: 200 });
}
