import { Module } from '@nestjs/common';
import { ConfigModule } from '@nestjs/config';
import { AuthModule } from './auth/auth.module';
import { UsersModule } from './users/users.module';
import { CoursesModule } from './courses/courses.module';
import { ClassesModule } from './classes/classes.module';
import { FilesModule } from './files/files.module';

@Module({
  imports: [ConfigModule.forRoot({ isGlobal: true }), AuthModule, UsersModule, CoursesModule, ClassesModule, FilesModule]
})
export class AppModule {}
