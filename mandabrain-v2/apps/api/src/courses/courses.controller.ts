import { Controller, Get } from '@nestjs/common';

@Controller('courses')
export class CoursesController {
  @Get()
  list() {
    return {
      items: [
        { id: 1, title: 'Next.js Fundamentos' },
        { id: 2, title: 'TypeScript na Prática' },
        { id: 3, title: 'Testes com Vitest' }
      ]
    };
  }
}
