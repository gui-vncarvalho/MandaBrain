export type UserRole = 'student' | 'teacher' | 'admin';

export type UserRecord = {
  id: number;
  email: string;
  name: string;
  role: UserRole;
  passwordHash: string;
};
