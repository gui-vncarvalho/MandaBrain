import Link from 'next/link';
import { LoginForm } from '@/components/login-form';

export default function LoginPage() {
  return (
    <main className="page">
      <section className="card">
        <h1 className="title">Login (v2 - etapa 3)</h1>
        <p className="subtitle">
          Estrutura inicial de autenticação para evoluirmos para integração com backend e banco
          versionado.
        </p>

        <LoginForm />

        <p className="footer-link">
          <Link href="/">← Voltar para home</Link>
        </p>
      </section>
    </main>
  );
}
