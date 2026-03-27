import { NextResponse } from 'next/server';
import { validateLoginInput } from '@/features/auth/validation';
import type { LoginInput, LoginSuccess } from '@/features/auth/types';

export function buildLoginSuccess(email: string): LoginSuccess {
  const role: LoginSuccess['user']['role'] = email.includes('admin') ? 'admin' : 'student';

  return {
    accessToken: 'dev-token-mandabrain-v2',
    user: {
      id: 1,
      name: email.split('@')[0] || 'Usuário',
      role
    }
  };
}

export async function POST(request: Request) {
  const body = (await request.json()) as LoginInput;
  const errors = validateLoginInput(body);

  if (errors.length > 0) {
    return NextResponse.json({ error: errors[0] }, { status: 400 });
  }

  return NextResponse.json(buildLoginSuccess(body.email), { status: 200 });
}
