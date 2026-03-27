'use client';

import { useRouter } from 'next/navigation';
import { useState } from 'react';
import { login } from '@/features/auth/service';

export function LoginForm() {
  const router = useRouter();
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [error, setError] = useState<string | null>(null);
  const [success, setSuccess] = useState<string | null>(null);
  const [loading, setLoading] = useState(false);

  async function onSubmit(event: React.FormEvent<HTMLFormElement>) {
    event.preventDefault();
    setError(null);
    setSuccess(null);
    setLoading(true);

    try {
      const result = await login({ email, password });
      setSuccess(`Login OK: ${result.user.name} (${result.user.role})`);
      router.push('/dashboard');
      router.refresh();
    } catch (submitError) {
      setError(submitError instanceof Error ? submitError.message : 'Erro inesperado.');
    } finally {
      setLoading(false);
    }
  }

  return (
    <form onSubmit={onSubmit} className="grid-form">
      <label className="label">
        E-mail
        <input
          className="input"
          type="email"
          value={email}
          onChange={(event) => setEmail(event.target.value)}
          placeholder="voce@email.com"
          required
        />
      </label>

      <label className="label">
        Senha
        <input
          className="input"
          type="password"
          value={password}
          onChange={(event) => setPassword(event.target.value)}
          placeholder="mínimo 8 caracteres"
          required
        />
      </label>

      <button className="button" type="submit" disabled={loading}>
        {loading ? 'Entrando...' : 'Entrar'}
      </button>

      {error ? <p className="feedback error">{error}</p> : null}
      {success ? <p className="feedback success">{success}</p> : null}
    </form>
  );
}
