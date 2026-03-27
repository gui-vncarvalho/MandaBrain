import type { AuthUser, LoginError, LoginInput, LoginSuccess } from './types';

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

export async function getCurrentUser(): Promise<AuthUser | null> {
  const response = await fetch('/api/auth/me', {
    method: 'GET',
    credentials: 'include'
  });

  if (!response.ok) {
    return null;
  }

  const payload = (await response.json()) as { user: AuthUser };
  return payload.user;
}

export async function logout(): Promise<void> {
  await fetch('/api/auth/logout', {
    method: 'POST',
    credentials: 'include'
  });
}
