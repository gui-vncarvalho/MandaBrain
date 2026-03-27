import Link from 'next/link';
import { notFound, redirect } from 'next/navigation';
import { Badge } from '@/components/ui/badge';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { Progress } from '@/components/ui/progress';
import { getSessionUser } from '@/features/auth/get-session-user';
import { getCourseBySlug, getCourseProgress } from '@/features/courses/mock-data';

type CourseDetailsPageProps = {
  params: Promise<{
    slug: string;
  }>;
};

export default async function CourseDetailsPage({ params }: CourseDetailsPageProps) {
  const user = await getSessionUser();

  if (!user) {
    redirect('/login');
  }

  const { slug } = await params;
  const course = getCourseBySlug(slug);

  if (!course) {
    notFound();
  }

  const progress = getCourseProgress(course);

  return (
    <main className="mx-auto max-w-5xl px-4 py-8">
      <Card>
        <CardHeader className="gap-3">
          <p className="text-sm text-slate-500">
            <Link href="/dashboard">Dashboard</Link> / <Link href="/cursos">Cursos</Link> /{' '}
            <strong>{course.title}</strong>
          </p>
          <CardTitle>{course.title}</CardTitle>
          <CardDescription>{course.summary}</CardDescription>
          <div className="flex flex-wrap gap-2">
            <Badge>Nível: {course.level}</Badge>
            <Badge variant="outline">Instrutor: {course.instructor}</Badge>
            <Badge variant="outline">Perfil: {user.role}</Badge>
          </div>
        </CardHeader>

        <CardContent className="grid gap-6">
          <div className="grid gap-2">
            <div className="flex items-center justify-between text-sm text-slate-600">
              <span>Conclusão</span>
              <strong>{progress.percent}%</strong>
            </div>
            <Progress value={progress.percent} />
          </div>

          <section className="grid gap-3">
            <h2 className="text-xl font-semibold text-slate-900">Aulas</h2>
            <ul className="grid gap-2">
              {course.lessons.map((lesson) => (
                <li
                  key={lesson.id}
                  className="flex flex-wrap items-center justify-between gap-2 rounded-xl border border-slate-200 p-3"
                >
                  <div>
                    <strong className="block text-slate-800">{lesson.title}</strong>
                    <p className="text-sm text-slate-500">{lesson.durationMinutes} min</p>
                  </div>
                  <Badge variant={lesson.completed ? 'success' : 'warning'}>
                    {lesson.completed ? 'Concluída' : 'Pendente'}
                  </Badge>
                </li>
              ))}
            </ul>
          </section>

          <Link href="/cursos" className="no-underline hover:no-underline">
            <Button variant="ghost">Voltar ao catálogo</Button>
          </Link>
        </CardContent>
      </Card>
    </main>
  );
}
