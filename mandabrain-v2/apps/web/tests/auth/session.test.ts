import { describe, expect, it } from 'vitest';
import { createSessionToken, parseSessionToken } from '../../src/features/auth/session';

describe('session token', () => {
  it('serializa e desserializa usuário da sessão', () => {
    const token = createSessionToken({ id: 10, name: 'aluno', role: 'student' });
    const parsed = parseSessionToken(token);

    expect(parsed).toEqual({ id: 10, name: 'aluno', role: 'student' });
  });

  it('retorna null para token inválido', () => {
    const parsed = parseSessionToken('token-invalido');

    expect(parsed).toBeNull();
  });
});
