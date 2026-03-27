export type LoginInput = {
  email: string;
  password: string;
};

export type UserRole = 'student' | 'teacher' | 'admin';

export type AuthUser = {
  id: number;
  name: string;
  role: UserRole;
};

export type LoginSuccess = {
  user: AuthUser;
};

export type LoginError = {
  error: string;
};
