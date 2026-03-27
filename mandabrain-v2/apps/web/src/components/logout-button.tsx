'use client';

import { useState } from 'react';
import { useRouter } from 'next/navigation';
import { logout, refreshSession } from '@/features/auth/service';
import { Button } from '@/components/ui/button';

export function LogoutButton() {
  const router = useRouter();
  const [status, setStatus] = useState<string | null>(null);

  async function handleRefresh() {
    const user = await refreshSession();
    setStatus(user ? `Sessão renovada para ${user.name}.` : 'Não foi possível renovar a sessão.');
    router.refresh();
  }

  async function handleLogout() {
    await logout();
    router.push('/login');
    router.refresh();
  }

  return (
    <div className="flex flex-wrap items-center gap-3">
      <Button type="button" onClick={handleRefresh}>
        Renovar sessão
      </Button>
      <Button type="button" variant="secondary" onClick={handleLogout}>
        Sair
      </Button>
      {status ? <small className="text-sm text-slate-600">{status}</small> : null}
    </div>
  );
}
