 <?php

     // Script to reorder migration files based on dependencies

     $migrationDir = __DIR__ . '/database/migrations/';
     $baseTimestamp = '2025_05_08_1948';

     // Define desired migration order with timestamps
     $desiredOrder = [
         'create_users_table' => '0001_01_01_000000', // Core Laravel
         'create_cache_table' => '0001_01_01_000001', // Core Laravel
         'create_jobs_table' => '0001_01_01_000002', // Core Laravel
         'create_personal_access_tokens_table' => '2025_05_08_193333', // Sanctum
         'create_permission_tables' => '2025_05_08_193827', // Spatie
         'create_departments_table' => $baseTimestamp . '50',
         'create_classrooms_table' => $baseTimestamp . '51',
         'create_subjects_table' => $baseTimestamp . '52',
         'create_fee_structures_table' => $baseTimestamp . '53',
         'create_books_table' => $baseTimestamp . '54',
         'create_events_table' => $baseTimestamp . '55',
         'create_notices_table' => $baseTimestamp . '56',
         'create_sections_table' => $baseTimestamp . '57',
         'create_staff_table' => $baseTimestamp . '58',
         'create_teachers_table' => $baseTimestamp . '59',
         'create_parent_profiles_table' => $baseTimestamp . '60',
         'create_students_table' => $baseTimestamp . '61',
         'create_classroom_subjects_table' => $baseTimestamp . '62',
         'create_timetables_table' => $baseTimestamp . '63',
         'create_exams_table' => $baseTimestamp . '64',
         'create_assignments_table' => $baseTimestamp . '65',
         'create_attendances_table' => $baseTimestamp . '66',
         'create_invoices_table' => $baseTimestamp . '67',
         'create_grades_table' => $baseTimestamp . '68',
         'create_marks_table' => $baseTimestamp . '69',
         'create_payments_table' => $baseTimestamp . '70',
         'create_submissions_table' => $baseTimestamp . '71',
         'create_borrows_table' => $baseTimestamp . '72',
     ];

     $files = glob($migrationDir . '*.php');

     foreach ($files as $file) {
         $filename = basename($file);

         foreach ($desiredOrder as $table => $timestamp) {
             if (strpos($filename, $table) !== false) {
                 $newFilename = preg_replace(
                     '/^\d{4}_\d{2}_\d{2}_\d{6}/',
                     $timestamp,
                     $filename
                 );

                 if ($filename !== $newFilename) {
                     rename($file, $migrationDir . $newFilename);
                     echo "Renamed: $filename to $newFilename\n";
                 } else {
                     echo "No change needed: $filename\n";
                 }
                 break;
             }
         }
     }

     // Regenerate autoloader
     exec('composer dump-autoload');
     echo "Composer autoloader regenerated.\n";

     echo "Migration reordering complete!\n";
