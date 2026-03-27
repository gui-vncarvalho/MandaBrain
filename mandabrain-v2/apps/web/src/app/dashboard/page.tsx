import Link from 'next/link';
import { redirect } from 'next/navigation';
import { LogoutButton } from '@/components/logout-button';
import { Badge } from '@/components/ui/badge';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { getSessionUser } from '@/features/auth/get-session-user';
import { getLearningSummary } from '@/features/courses/mock-data';

export default async function DashboardPage() {
  const user = await getSessionUser();

  if (!user) {
    redirect('/login?from=/dashboard');
  }

  const summary = getLearningSummary();

  return (
    <main className="mx-auto max-w-6xl px-4 py-8">
      <Card>
        <CardHeader>
          <CardTitle>Dashboard</CardTitle>
          <CardDescription>
            Sessão ativa para <strong>{user.name}</strong>.
          </CardDescription>
          <div className="pt-2">
            <Badge variant="outline">Perfil: {user.role}</Badge>
          </div>
        </CardHeader>
        <CardContent className="grid gap-6">
          <div className="grid gap-3 sm:grid-cols-3">
            <StatCard label="Cursos disponíveis" value={`${summary.totalCourses}`} />
            <StatCard label="Aulas concluídas" value={`${summary.completedLessons}/${summary.totalLessons}`} />
            <StatCard label="Progresso geral" value={`${summary.percent}%`} />
          </div>

          <div className="flex flex-wrap gap-3">
            <Link href="/cursos" className="no-underline hover:no-underline">
              <Button>Explorar cursos</Button>
            </Link>
            <Link href="/" className="no-underline hover:no-underline">
              <Button variant="ghost">Voltar para home</Button>
            </Link>
          </div>

          <LogoutButton />
        </CardContent>
      </Card>
    </main>
  );
}

type StatCardProps = {
  label: string;
  value: string;
};

function StatCard({ label, value }: StatCardProps) {
  return (
    <article className="rounded-xl border border-slate-200 bg-slate-50 p-4">
      <span className="block text-sm text-slate-500">{label}</span>
      <strong className="mt-1 block text-2xl text-slate-800">{value}</strong>
    </article>
  );
}
