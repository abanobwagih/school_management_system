?<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    AuthController,UserController,StudentController, ParentController, ClassroomController, SectionController, TeacherController,
    StaffController, DepartmentController, SubjectController, TimetableController, ClassroomSubjectController,
    AttendanceController, ExamController, MarkController, GradeController, AssignmentController,
    SubmissionController, FeeStructureController, InvoiceController, PaymentController,
    BookController, BorrowController, EventController,DED, NoticeController
};
Route::post('/login', [AuthController::class, 'login']);
Route::middleware(['auth:sanctum', 'log.ip'])->group(function () {
    // Admin-only routes
    Route::middleware('role:admin')->group(function () {
        Route::apiResource('users', UserController::class);
        Route::apiResource('students', StudentController::class);
        Route::apiResource('teachers', TeacherController::class);
        Route::apiResource('staff', StaffController::class);
        Route::apiResource('departments', DepartmentController::class);
        Route::apiResource('subjects', SubjectController::class);
        Route::apiResource('classrooms', ClassroomController::class);
        Route::apiResource('sections', SectionController::class);
        Route::apiResource('fee-structures', FeeStructureController::class);
        Route::apiResource('invoices', InvoiceController::class);
        Route::apiResource('payments', PaymentController::class);
        Route::apiResource('books', BookController::class);
        Route::apiResource('events', EventController::class);
        Route::apiResource('notices', NoticeController::class);
    });

    // Teacher-only routes
    Route::middleware('role:teacher')->group(function () {
        Route::apiResource('assignments', AssignmentController::class)->except(['destroy']);
        Route::apiResource('marks', MarkController::class);
        Route::apiResource('attendances', AttendanceController::class);
        Route::apiResource('timetables', TimetableController::class);
        Route::apiResource('classroom-subjects', ClassroomSubjectController::class);
    });

    // Student-only routes
    Route::middleware('role:student')->group(function () {
        Route::get('submissions', [SubmissionController::class, 'index']);
        Route::post('submissions', [SubmissionController::class, 'store']);
        Route::get('submissions/{id}', [SubmissionController::class, 'show']);
    });

    // Parent-only routes
    Route::middleware('role:parent')->group(function () {
        Route::get('parents', [ParentController::class, 'index']);
    });
});
