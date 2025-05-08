<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * The Faker instance.
     *
     * @var \Faker\Generator
     */
        public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            DepartmentSeeder::class,
            TeacherSeeder::class,
            ClassroomSeeder::class,
            SectionSeeder::class,
            SubjectSeeder::class,
            StudentSeeder::class,
            ParentSeeder::class,
            ExamSeeder::class,
            GradeSeeder::class,
            MarkSeeder::class,
            TimetableSeeder::class,
            AssignmentSeeder::class,
            AttendanceSeeder::class,
            FeeStructureSeeder::class,
            InvoiceSeeder::class,
            PaymentSeeder::class,
            BookSeeder::class,
            BorrowSeeder::class,
            EventSeeder::class,
            NoticeSeeder::class,
            StaffSeeder::class,
        ]);
    }
}
