import type { LoginInput } from './types';

const EMAIL_REGEX = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

export function validateLoginInput(input: LoginInput): string[] {
  const errors: string[] = [];

  if (!input.email?.trim()) {
    errors.push('E-mail é obrigatório.');
  } else if (!EMAIL_REGEX.test(input.email)) {
    errors.push('E-mail inválido.');
  }

  if (!input.password?.trim()) {
    errors.push('Senha é obrigatória.');
  } else if (input.password.length < 8) {
    errors.push('Senha deve ter pelo menos 8 caracteres.');
  }

  return errors;
}
