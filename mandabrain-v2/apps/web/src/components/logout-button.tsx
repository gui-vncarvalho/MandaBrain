'use client';

import { useState } from 'react';
import { useRouter } from 'next/navigation';
import { logout, refreshSession } from '@/features/auth/service';

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
    <div className="inline-actions">
      <button className="button" type="button" onClick={handleRefresh}>
        Renovar sessão
      </button>
      <button className="button secondary" type="button" onClick={handleLogout}>
        Sair
      </button>
      {status ? <small className="feedback">{status}</small> : null}
    </div>
  );
}
