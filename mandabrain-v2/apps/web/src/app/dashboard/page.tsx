import Link from 'next/link';
import { cookies } from 'next/headers';
import { parseSessionToken, SESSION_COOKIE_NAME } from '@/features/auth/session';
import { LogoutButton } from '@/components/logout-button';

export default async function DashboardPage() {
  const cookieStore = await cookies();
  const token = cookieStore.get(SESSION_COOKIE_NAME)?.value;
  const user = token ? parseSessionToken(token) : null;

  return (
    <main style={{ maxWidth: 900, margin: '0 auto', padding: 24, fontFamily: 'sans-serif' }}>
      <h1>Dashboard (v2 - etapa 3)</h1>
      {user ? (
        <p>
          Sessão ativa para <strong>{user.name}</strong> ({user.role}).
        </p>
      ) : (
        <p>Nenhuma sessão válida encontrada.</p>
      )}

      <LogoutButton />

      <p style={{ marginTop: 16 }}>
        <Link href="/">← Voltar para home</Link>
      </p>
    </main>
  );
}
