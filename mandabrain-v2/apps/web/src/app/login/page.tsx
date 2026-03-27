import Link from 'next/link';
import { LoginForm } from '@/components/login-form';

export default function LoginPage() {
  return (
    <main style={{ maxWidth: 900, margin: '0 auto', padding: 24, fontFamily: 'sans-serif' }}>
      <h1>Login (v2 - etapa 2)</h1>
      <p>
        Estrutura inicial de autenticação para evoluirmos para integração com backend e banco
        versionado.
      </p>

      <LoginForm />

      <p style={{ marginTop: 16 }}>
        <Link href="/">← Voltar para home</Link>
      </p>
    </main>
  );
}
