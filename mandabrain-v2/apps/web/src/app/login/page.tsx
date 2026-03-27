import Link from 'next/link';
import { LoginForm } from '@/components/login-form';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';

type LoginPageProps = {
  searchParams: Promise<{
    from?: string;
  }>;
};

export default async function LoginPage({ searchParams }: LoginPageProps) {
  const { from } = await searchParams;

  return (
    <main className="mx-auto max-w-xl px-4 py-8">
      <Card>
        <CardHeader>
          <CardTitle>Login (v2)</CardTitle>
          <CardDescription>
            Fluxo inicial de autenticação para evoluir as features mantendo segurança básica de
            sessão.
          </CardDescription>
        </CardHeader>
        <CardContent className="grid gap-4">
          <LoginForm redirectTo={from || '/dashboard'} />
          <p className="text-sm text-slate-600">
            <Link href="/">← Voltar para home</Link>
          </p>
        </CardContent>
      </Card>
    </main>
  );
}
