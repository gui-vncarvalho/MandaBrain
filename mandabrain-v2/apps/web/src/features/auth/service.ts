import type { LoginError, LoginInput, LoginSuccess } from './types';

export async function login(input: LoginInput): Promise<LoginSuccess> {
  const response = await fetch('/api/auth/login', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(input)
  });

  if (!response.ok) {
    const error = (await response.json()) as LoginError;
    throw new Error(error.error ?? 'Falha ao autenticar.');
  }

  return (await response.json()) as LoginSuccess;
}
