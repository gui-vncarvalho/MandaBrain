import { describe, expect, it } from 'vitest';
import { validateLoginInput } from '../../src/features/auth/validation';

describe('validateLoginInput', () => {
  it('retorna erros para payload inválido', () => {
    const result = validateLoginInput({ email: 'abc', password: '123' });

    expect(result).toContain('E-mail inválido.');
    expect(result).toContain('Senha deve ter pelo menos 8 caracteres.');
  });

  it('não retorna erros para payload válido', () => {
    const result = validateLoginInput({ email: 'aluno@mandabrain.com', password: '12345678' });

    expect(result).toEqual([]);
  });
});
