import { describe, expect, it } from 'vitest';
import { buildLoginSuccess } from '../../src/app/api/auth/login/route';

describe('buildLoginSuccess', () => {
  it('retorna role admin quando email contém admin', () => {
    const result = buildLoginSuccess('admin@mandabrain.com');

    expect(result.user.role).toBe('admin');
  });

  it('retorna role student para usuário comum', () => {
    const result = buildLoginSuccess('aluno@mandabrain.com');

    expect(result.user.role).toBe('student');
    expect(result.user.name).toBe('aluno');
  });

  it('retorna role teacher quando email contém prof', () => {
    const result = buildLoginSuccess('prof.julia@mandabrain.com');

    expect(result.user.role).toBe('teacher');
  });
});
