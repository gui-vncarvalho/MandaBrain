import type { Course, CourseProgress } from './types';

const MOCK_COURSES: Course[] = [
  {
    id: 'c1',
    slug: 'nextjs-fundamentos',
    title: 'Next.js Fundamentos',
    summary: 'App Router, Server Components e integração com APIs internas.',
    instructor: 'Julia Mendes',
    level: 'iniciante',
    tags: ['nextjs', 'frontend', 'react'],
    lessons: [
      { id: 'l1', title: 'Visão geral do App Router', durationMinutes: 18, completed: true },
      { id: 'l2', title: 'Layouts e páginas', durationMinutes: 24, completed: true },
      { id: 'l3', title: 'Rotas de API no Next', durationMinutes: 27, completed: false }
    ]
  },
  {
    id: 'c2',
    slug: 'typescript-na-pratica',
    title: 'TypeScript na Prática',
    summary: 'Tipos utilitários, narrowing e organização de módulos para projetos reais.',
    instructor: 'Marcos Lima',
    level: 'intermediario',
    tags: ['typescript', 'arquitetura'],
    lessons: [
      { id: 'l1', title: 'Modelagem de tipos de domínio', durationMinutes: 21, completed: true },
      { id: 'l2', title: 'Narrowing e guards', durationMinutes: 19, completed: false },
      { id: 'l3', title: 'Estratégias de refactor com segurança', durationMinutes: 31, completed: false }
    ]
  },
  {
    id: 'c3',
    slug: 'testes-com-vitest',
    title: 'Testes com Vitest',
    summary: 'Como criar testes rápidos para regras de negócio e rotas de API.',
    instructor: 'Ana Costa',
    level: 'iniciante',
    tags: ['testes', 'vitest'],
    lessons: [
      { id: 'l1', title: 'Primeiro teste unitário', durationMinutes: 14, completed: true },
      { id: 'l2', title: 'Organizando suites por feature', durationMinutes: 22, completed: true },
      { id: 'l3', title: 'Testando API routes', durationMinutes: 26, completed: true }
    ]
  }
];

export function listCourses(): Course[] {
  return MOCK_COURSES;
}

export function getCourseBySlug(slug: string): Course | null {
  return MOCK_COURSES.find((course) => course.slug === slug) ?? null;
}

export function getCourseProgress(course: Course): CourseProgress {
  const totalLessons = course.lessons.length;
  const completedLessons = course.lessons.filter((lesson) => lesson.completed).length;

  return {
    completedLessons,
    totalLessons,
    percent: totalLessons === 0 ? 0 : Math.round((completedLessons / totalLessons) * 100)
  };
}

export function getLearningSummary() {
  const courses = listCourses();
  const totalCourses = courses.length;
  const completedCourses = courses.filter((course) => getCourseProgress(course).percent === 100).length;
  const totalLessons = courses.reduce((total, course) => total + course.lessons.length, 0);
  const completedLessons = courses.reduce(
    (total, course) => total + getCourseProgress(course).completedLessons,
    0
  );

  return {
    totalCourses,
    completedCourses,
    totalLessons,
    completedLessons,
    percent: totalLessons === 0 ? 0 : Math.round((completedLessons / totalLessons) * 100)
  };
}
