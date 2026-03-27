import { Controller, Get } from '@nestjs/common';

@Controller('users')
export class UsersController {
  @Get()
  list() {
    return {
      items: [
        { id: 1, name: 'Admin MandaBrain', role: 'admin' },
        { id: 2, name: 'Prof Julia', role: 'teacher' },
        { id: 3, name: 'Aluno Demo', role: 'student' }
      ]
    };
  }
}
