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
    <form onSubmit={onSubmit} style={{ display: 'grid', gap: 12, maxWidth: 360 }}>
      <label>
        E-mail
        <input
          type="email"
          value={email}
          onChange={(event) => setEmail(event.target.value)}
          placeholder="voce@email.com"
          style={{ width: '100%', padding: 8 }}
          required
        />
      </label>

      <label>
        Senha
        <input
          type="password"
          value={password}
          onChange={(event) => setPassword(event.target.value)}
          placeholder="mínimo 8 caracteres"
          style={{ width: '100%', padding: 8 }}
          required
        />
      </label>

      <button type="submit" disabled={loading} style={{ padding: 10, cursor: 'pointer' }}>
        {loading ? 'Entrando...' : 'Entrar'}
      </button>

      {error ? <p style={{ color: '#c62828' }}>{error}</p> : null}
      {success ? <p style={{ color: '#2e7d32' }}>{success}</p> : null}
    </form>
  );
}
