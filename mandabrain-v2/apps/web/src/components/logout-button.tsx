'use client';

import { useRouter } from 'next/navigation';
import { logout } from '@/features/auth/service';

export function LogoutButton() {
  const router = useRouter();

  async function handleLogout() {
    await logout();
    router.push('/login');
    router.refresh();
  }

  return (
    <button type="button" onClick={handleLogout} style={{ padding: 10, cursor: 'pointer' }}>
      Sair
    </button>
  );
}
