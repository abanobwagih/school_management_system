```
@echo off
setlocal

echo Setting up School Management System backend...

:: Create Models
php artisan make:model User -m
php artisan make:model Role -m
php artisan make:model Permission -m
php artisan make:model Student -m
php artisan make:model ParentProfile -m
php artisan make:model Classroom -m
php artisan make:model Section -m
php artisan make:model Teacher -m
php artisan make:model Staff -m
php artisan make:model Department -m
php artisan make:model Subject -m
php artisan make:model Timetable -m
php artisan make:model ClassroomSubject -m
php artisan make:model Attendance -m
php artisan make:model Exam -m
php artisan make:model Mark -m
php artisan make:model Grade -m
php artisan make:model Assignment -m
php artisan make:model Submission -m
php artisan make:model FeeStructure -m
php artisan make:model Invoice -m
php artisan make:model Payment -m
php artisan make:model Book -m
php artisan make:model Borrow -m
php artisan make:model Event -m
php artisan make:model Notice -m

:: Create Resource Controllers
php artisan make:controller Api/StudentController --resource --model=Student
php artisan make:controller Api/ParentController --resource --model=ParentProfile
php artisan make:controller Api/ClassroomController --resource --model=Classroom
php artisan make:controller Api/SectionController --resource --model=Section
php artisan make:controller Api/TeacherController --resource --model=Teacher
php artisan make:controller Api/StaffController --resource --model=Staff
php artisan make:controller Api/DepartmentController --resource --model=Department
php artisan make:controller Api/SubjectController --resource --model=Subject
php artisan make:controller Api/TimetableController --resource --model=Timetable
php artisan make:controller Api/ClassroomSubjectController --resource --model=ClassroomSubject
php artisan make:controller Api/AttendanceController --resource --model=Attendance
php artisan make:controller Api/ExamController --resource --model=Exam
php artisan make:controller Api/MarkController --resource --model=Mark
php artisan make:controller Api/GradeController --resource --model=Grade
php artisan make:controller Api/AssignmentController --resource --model=Assignment
php artisan make:controller Api/SubmissionController --resource --model=Submission
php artisan make:controller Api/FeeStructureController --resource --model=FeeStructure
php artisan make:controller Api/InvoiceController --resource --model=Invoice
php artisan make:controller Api/PaymentController --resource --model=Payment
php artisan make:controller Api/BookController --resource --model=Book
php artisan make:controller Api/BorrowController --resource --model=Borrow
php artisan make:controller Api/EventController --resource --model=Event
php artisan make:controller Api/NoticeController --resource --model=Notice

:: Create Form Requests
php artisan make:request StoreStudentRequest
php artisan make:request UpdateStudentRequest
php artisan make:request StoreParentProfileRequest
php artisan make:request UpdateParentProfileRequest
php artisan make:request StoreClassroomRequest
php artisan make:request UpdateClassroomRequest
php artisan make:request StoreSectionRequest
php artisan make:request UpdateSectionRequest
php artisan make:request StoreTeacherRequest
php artisan make:request UpdateTeacherRequest
php artisan make:request StoreStaffRequest
php artisan make:request UpdateStaffRequest
php artisan make:request StoreDepartmentRequest
php artisan make:request UpdateDepartmentRequest
php artisan make:request StoreSubjectRequest
php artisan make:request UpdateSubjectRequest
php artisan make:request StoreTimetableRequest
php artisan make:request UpdateTimetableRequest
php artisan make:request StoreClassroomSubjectRequest
php artisan make:request UpdateClassroomSubjectRequest
php artisan make:request StoreAttendanceRequest
php artisan make:request UpdateAttendanceRequest
php artisan make:request StoreExamRequest
php artisan make:request UpdateExamRequest
php artisan make:request StoreMarkRequest
php artisan make:request UpdateMarkRequest
php artisan make:request StoreGradeRequest
php artisan make:request UpdateGradeRequest
php artisan make:request StoreAssignmentRequest
php artisan make:request UpdateAssignmentRequest
php artisan make:request StoreSubmissionRequest
php artisan make:request UpdateSubmissionRequest
php artisan make:request StoreFeeStructureRequest
php artisan make:request UpdateFeeStructureRequest
php artisan make:request StoreInvoiceRequest
php artisan make:request UpdateInvoiceRequest
php artisan make:request StorePaymentRequest
php artisan make:request UpdatePaymentRequest
php artisan make:request StoreBookRequest
php artisan make:request UpdateBookRequest
php artisan make:request StoreBorrowRequest
php artisan make:request UpdateBorrowRequest
php artisan make:request StoreEventRequest
php artisan make:request UpdateEventRequest
php artisan make:request StoreNoticeRequest
php artisan make:request UpdateNoticeRequest

:: Create Seeders
php artisan make:seeder RoleSeeder
php artisan make:seeder UserSeeder
php artisan make:seeder DepartmentSeeder
php artisan make:seeder TeacherSeeder
php artisan make:seeder ClassroomSeeder
php artisan make:seeder SectionSeeder
php artisan make:seeder SubjectSeeder
php artisan make:seeder StudentSeeder
php artisan make:seeder ParentSeeder
php artisan make:seeder ExamSeeder
php artisan make:seeder GradeSeeder
php artisan make:seeder MarkSeeder
php artisan make:seeder TimetableSeeder
php artisan make:seeder AssignmentSeeder
php artisan make:seeder AttendanceSeeder
php artisan make:seeder FeeStructureSeeder
php artisan make:seeder InvoiceSeeder
php artisan make:seeder PaymentSeeder
php artisan make:seeder BookSeeder
php artisan make:seeder BorrowSeeder
php artisan make:seeder EventSeeder
php artisan make:seeder NoticeSeeder
php artisan make:seeder DatabaseSeeder

:: Create Factories
php artisan make:factory UserFactory
php artisan make:factory StudentFactory
php artisan make:factory ParentProfileFactory
php artisan make:factory ClassroomFactory
php artisan make:factory SectionFactory
php artisan make:factory TeacherFactory
php artisan make:factory StaffFactory
php artisan make:factory DepartmentFactory
php artisan make:factory SubjectFactory
php artisan make:factory TimetableFactory
php artisan make:factory ClassroomSubjectFactory
php artisan make:factory AttendanceFactory
php artisan make:factory ExamFactory
php artisan make:factory MarkFactory
php artisan make:factory GradeFactory
php artisan make:factory AssignmentFactory
php artisan make:factory SubmissionFactory
php artisan make:factory FeeStructureFactory
php artisan make:factory InvoiceFactory
php artisan make:factory PaymentFactory
php artisan make:factory BookFactory
php artisan make:factory BorrowFactory
php artisan make:factory EventFactory
php artisan make:factory NoticeFactory

:: Create API Routes File
echo. > routes\api.php

:: Install Dependencies
composer require laravel/sanctum spatie/laravel-permission
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"

:: Setup Environment
copy .env.example .env
php artisan key:generate

:: Run Migrations and Seeders
php artisan migrate:fresh --seed

:: Start Development Server
start /b php artisan serve
start /b npm run dev

echo Setup complete! Populate the generated files with the provided content.

endlocal
pause
```
