import { Controller, Get } from '@nestjs/common';

@Controller('classes')
export class ClassesController {
  @Get()
  list() {
    return {
      items: [
        { id: 1, name: 'Turma 2026.1 - Frontend' },
        { id: 2, name: 'Turma 2026.1 - Back-end' }
      ]
    };
  }
}
