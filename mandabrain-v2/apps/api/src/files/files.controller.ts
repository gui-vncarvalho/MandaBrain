import { Controller, Get } from '@nestjs/common';

@Controller('files')
export class FilesController {
  @Get('health')
  health() {
    return {
      uploads: 'ready',
      strategy: 'local-disk-placeholder'
    };
  }
}
