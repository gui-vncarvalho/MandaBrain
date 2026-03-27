export type CourseLevel = 'iniciante' | 'intermediario' | 'avancado';

export type CourseLesson = {
  id: string;
  title: string;
  durationMinutes: number;
  completed: boolean;
};

export type Course = {
  id: string;
  slug: string;
  title: string;
  summary: string;
  instructor: string;
  level: CourseLevel;
  tags: string[];
  lessons: CourseLesson[];
};

export type CourseProgress = {
  completedLessons: number;
  totalLessons: number;
  percent: number;
};
