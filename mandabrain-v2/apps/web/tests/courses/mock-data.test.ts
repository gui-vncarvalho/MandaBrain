import { describe, expect, it } from 'vitest';
import {
  getCourseBySlug,
  getCourseProgress,
  getLearningSummary,
  listCourses
} from '../../src/features/courses/mock-data';

describe('courses mock data', () => {
  it('lista cursos disponíveis', () => {
    const courses = listCourses();

    expect(courses.length).toBeGreaterThan(0);
    expect(courses[0]?.slug).toBeDefined();
  });

  it('retorna curso por slug quando existir', () => {
    const course = getCourseBySlug('nextjs-fundamentos');

    expect(course).not.toBeNull();
    expect(course?.title).toContain('Next.js');
  });

  it('calcula progresso de curso e resumo geral', () => {
    const course = getCourseBySlug('testes-com-vitest');
    expect(course).not.toBeNull();

    const progress = getCourseProgress(course!);
    const summary = getLearningSummary();

    expect(progress.percent).toBe(100);
    expect(summary.totalCourses).toBe(3);
    expect(summary.totalLessons).toBeGreaterThanOrEqual(summary.completedLessons);
  });
});
