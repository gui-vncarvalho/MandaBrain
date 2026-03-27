import type { LoginSuccess } from './types';

export const SESSION_COOKIE_NAME = 'mb_session';

export type SessionUser = LoginSuccess['user'];

export function createSessionToken(user: SessionUser): string {
  const payload = JSON.stringify({ user });
  return Buffer.from(payload, 'utf-8').toString('base64url');
}

export function parseSessionToken(token: string): SessionUser | null {
  try {
    const json = Buffer.from(token, 'base64url').toString('utf-8');
    const payload = JSON.parse(json) as { user?: SessionUser };

    if (!payload.user?.id || !payload.user?.name || !payload.user?.role) {
      return null;
    }

    return payload.user;
  } catch {
    return null;
  }
}
