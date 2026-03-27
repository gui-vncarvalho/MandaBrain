import Link from 'next/link';
import { redirect } from 'next/navigation';
import { Badge } from '@/components/ui/badge';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { Progress } from '@/components/ui/progress';
import { getSessionUser } from '@/features/auth/get-session-user';
import { getCourseProgress, getLearningSummary, listCourses } from '@/features/courses/mock-data';

export default async function CoursesPage() {
  const user = await getSessionUser();

  if (!user) {
    redirect('/login?from=/cursos');
  }

  const courses = listCourses();
  const summary = getLearningSummary();

  return (
    <main className="mx-auto max-w-6xl px-4 py-8">
      <Card>
        <CardHeader className="gap-3">
          <div className="flex flex-wrap items-center justify-between gap-3">
            <CardTitle>Catálogo de cursos (mock)</CardTitle>
            <Link href="/dashboard" className="no-underline hover:no-underline">
              <Button variant="ghost" size="sm">
                Voltar ao dashboard
              </Button>
            </Link>
          </div>
          <CardDescription>
            Olá, <strong>{user.name}</strong>. Nesta fase usamos dados mock para acelerar a montagem
            de features sem bloquear o fluxo de produto.
          </CardDescription>
        </CardHeader>

        <CardContent className="grid gap-6">
          <div className="grid gap-3 sm:grid-cols-3">
            <SummaryItem label="Cursos no catálogo" value={`${summary.totalCourses}`} />
            <SummaryItem label="Cursos concluídos" value={`${summary.completedCourses}`} />
            <SummaryItem label="Progresso geral" value={`${summary.percent}%`} />
          </div>

          <div className="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
            {courses.map((course) => {
              const progress = getCourseProgress(course);

              return (
                <article key={course.id} className="grid gap-4 rounded-xl border border-slate-200 p-4">
                  <div className="grid gap-1">
                    <h2 className="text-lg font-semibold text-slate-900">{course.title}</h2>
                    <p className="text-sm text-slate-600">{course.summary}</p>
                  </div>

                  <div className="flex flex-wrap gap-2">
                    <Badge>{course.level}</Badge>
                    <Badge variant="outline">{course.instructor}</Badge>
                  </div>

                  <div className="grid gap-2">
                    <div className="flex items-center justify-between text-sm text-slate-600">
                      <span>Progresso</span>
                      <strong>
                        {progress.completedLessons}/{progress.totalLessons}
                      </strong>
                    </div>
                    <Progress value={progress.percent} />
                  </div>

                  <Link href={`/cursos/${course.slug}`} className="no-underline hover:no-underline">
                    <Button className="w-full">Ver curso</Button>
                  </Link>
                </article>
              );
            })}
          </div>
        </CardContent>
      </Card>
    </main>
  );
}

type SummaryItemProps = {
  label: string;
  value: string;
};

function SummaryItem({ label, value }: SummaryItemProps) {
  return (
    <article className="rounded-xl border border-slate-200 bg-slate-50 p-4">
      <span className="block text-sm text-slate-500">{label}</span>
      <strong className="mt-1 block text-2xl text-slate-800">{value}</strong>
    </article>
  );
}
