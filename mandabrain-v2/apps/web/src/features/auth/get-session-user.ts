import { cookies } from 'next/headers';
import { parseSessionToken, SESSION_COOKIE_NAME } from './session';

export async function getSessionUser() {
  const cookieStore = await cookies();
  const token = cookieStore.get(SESSION_COOKIE_NAME)?.value;

  return token ? parseSessionToken(token) : null;
}
