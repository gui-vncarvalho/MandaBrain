export type LoginInput = {
  email: string;
  password: string;
};

export type LoginSuccess = {
  accessToken: string;
  user: {
    id: number;
    name: string;
    role: 'student' | 'teacher' | 'admin';
  };
};

export type LoginError = {
  error: string;
};
