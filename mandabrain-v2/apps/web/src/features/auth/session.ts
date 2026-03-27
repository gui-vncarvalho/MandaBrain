import { createHmac, timingSafeEqual } from 'node:crypto';
import type { LoginSuccess } from './types';

export const SESSION_COOKIE_NAME = 'mb_session';
const DEFAULT_TTL_SECONDS = 60 * 60 * 12;
const MIN_SECRET_LENGTH = 32;

export type SessionUser = LoginSuccess['user'];

type SessionPayload = {
  user: SessionUser;
  exp: number;
};

type CreateTokenOptions = {
  ttlSeconds?: number;
  nowMs?: number;
};

function getSessionSecret(): string {
  const secret = process.env.SESSION_SECRET;

  if (!secret || secret.length < MIN_SECRET_LENGTH) {
    throw new Error(
      `SESSION_SECRET inválido. Defina um segredo com pelo menos ${MIN_SECRET_LENGTH} caracteres.`
    );
  }

  return secret;
}

function sign(value: string): string {
  return createHmac('sha256', getSessionSecret()).update(value).digest('base64url');
}

export function createSessionToken(user: SessionUser, options: CreateTokenOptions = {}): string {
  const now = options.nowMs ?? Date.now();
  const ttl = options.ttlSeconds ?? DEFAULT_TTL_SECONDS;

  const payload: SessionPayload = {
    user,
    exp: Math.floor(now / 1000) + ttl
  };

  const payloadEncoded = Buffer.from(JSON.stringify(payload), 'utf-8').toString('base64url');
  const signature = sign(payloadEncoded);
  return `${payloadEncoded}.${signature}`;
}

export function parseSessionToken(token: string, nowMs = Date.now()): SessionUser | null {
  try {
    const [payloadEncoded, signature] = token.split('.');

    if (!payloadEncoded || !signature) {
      return null;
    }

    const expectedSignature = sign(payloadEncoded);
    const signatureMatches = timingSafeEqual(
      Buffer.from(signature, 'utf-8'),
      Buffer.from(expectedSignature, 'utf-8')
    );

    if (!signatureMatches) {
      return null;
    }

    const json = Buffer.from(payloadEncoded, 'base64url').toString('utf-8');
    const payload = JSON.parse(json) as SessionPayload;

    if (!payload.user?.id || !payload.user?.name || !payload.user?.role || !payload.exp) {
      return null;
    }

    const nowSeconds = Math.floor(nowMs / 1000);
    if (payload.exp <= nowSeconds) {
      return null;
    }

    return payload.user;
  } catch {
    return null;
  }
}
