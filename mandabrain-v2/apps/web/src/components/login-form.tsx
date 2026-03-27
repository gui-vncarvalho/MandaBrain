'use client';

import { useRouter } from 'next/navigation';
import { useState } from 'react';
import { login } from '@/features/auth/service';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';

type LoginFormProps = {
  redirectTo?: string;
};

export function LoginForm({ redirectTo = '/dashboard' }: LoginFormProps) {
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
      router.push(redirectTo);
      router.refresh();
    } catch (submitError) {
      setError(submitError instanceof Error ? submitError.message : 'Erro inesperado.');
    } finally {
      setLoading(false);
    }
  }

  return (
    <form onSubmit={onSubmit} className="grid gap-4">
      <label className="grid gap-2 text-sm font-medium text-slate-700">
        E-mail
        <Input
          type="email"
          value={email}
          onChange={(event) => setEmail(event.target.value)}
          placeholder="voce@email.com"
          required
        />
      </label>

      <label className="grid gap-2 text-sm font-medium text-slate-700">
        Senha
        <Input
          type="password"
          value={password}
          onChange={(event) => setPassword(event.target.value)}
          placeholder="mínimo 8 caracteres"
          required
        />
      </label>

      <Button type="submit" disabled={loading}>
        {loading ? 'Entrando...' : 'Entrar'}
      </Button>

      {error ? <p className="text-sm font-medium text-red-700">{error}</p> : null}
      {success ? <p className="text-sm font-medium text-emerald-700">{success}</p> : null}
    </form>
  );
}
