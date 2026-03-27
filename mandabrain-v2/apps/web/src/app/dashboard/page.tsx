import Link from 'next/link';
import { cookies } from 'next/headers';
import { parseSessionToken, SESSION_COOKIE_NAME } from '@/features/auth/session';
import { LogoutButton } from '@/components/logout-button';

export default async function DashboardPage() {
  const cookieStore = await cookies();
  const token = cookieStore.get(SESSION_COOKIE_NAME)?.value;
  const user = token ? parseSessionToken(token) : null;

  return (
    <main className="page">
      <section className="card">
        <h1 className="title">Dashboard (v2 - etapa 3)</h1>
        {user ? (
          <p className="subtitle">
            Sessão ativa para <strong>{user.name}</strong> ({user.role}).
          </p>
        ) : (
          <p className="feedback error">Nenhuma sessão válida encontrada.</p>
        )}

        <LogoutButton />

        <p className="footer-link">
          <Link href="/">← Voltar para home</Link>
        </p>
      </section>
    </main>
  );
}
