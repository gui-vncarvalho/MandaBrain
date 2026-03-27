import { afterEach, beforeEach, describe, expect, it } from 'vitest';
import { createSessionToken, parseSessionToken } from '../../src/features/auth/session';

const ORIGINAL_SECRET = process.env.SESSION_SECRET;

beforeEach(() => {
  process.env.SESSION_SECRET = 'test-secret-com-mais-de-32-caracteres-123';
});

afterEach(() => {
  process.env.SESSION_SECRET = ORIGINAL_SECRET;
});

describe('session token (signed)', () => {
  it('serializa e desserializa usuário da sessão com assinatura válida', () => {
    const token = createSessionToken({ id: 10, name: 'aluno', role: 'student' }, { nowMs: 1_000 });
    const parsed = parseSessionToken(token, 2_000);

    expect(parsed).toEqual({ id: 10, name: 'aluno', role: 'student' });
  });

  it('retorna null quando payload é adulterado', () => {
    const token = createSessionToken({ id: 10, name: 'aluno', role: 'student' });
    const [payload, signature] = token.split('.');
    const tamperedPayload = `${payload}x`;
    const tampered = `${tamperedPayload}.${signature}`;

    expect(parseSessionToken(tampered)).toBeNull();
  });

  it('retorna null para token expirado', () => {
    const token = createSessionToken(
      { id: 10, name: 'aluno', role: 'student' },
      { ttlSeconds: 1, nowMs: 1_000 }
    );

    expect(parseSessionToken(token, 3_000)).toBeNull();
  });

  it('lança erro quando SESSION_SECRET está ausente', () => {
    delete process.env.SESSION_SECRET;

    expect(() =>
      createSessionToken({ id: 10, name: 'aluno', role: 'student' }, { nowMs: 1_000 })
    ).toThrow('SESSION_SECRET inválido');
  });
});
