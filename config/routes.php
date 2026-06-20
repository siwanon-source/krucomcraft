<?php
declare(strict_types=1);

return [
    'pages' => ['dashboard', 'courses', 'qr-grading', 'media', 'blog', 'portfolio', 'academy', 'learn', 'booking', 'login', 'register', 'profile', 'admin'],
    'actions' => [
        'login' => [App\Http\Controllers\AuthController::class, 'login'],
        'logout' => [App\Http\Controllers\AuthController::class, 'logout'],
        'register' => [App\Http\Controllers\AuthController::class, 'register'],
        'enroll_course' => [App\Http\Controllers\EnrollmentController::class, 'store'],
        'save_grade' => [App\Http\Controllers\GradeController::class, 'store'],
        'create_course' => [App\Http\Controllers\CourseController::class, 'store'],
        'mark_lesson_complete' => [App\Http\Controllers\LearningProgressController::class, 'store'],
        'update_profile' => [App\Http\Controllers\ProfileController::class, 'update'],
        'set_current_term' => [App\Http\Controllers\SettingsController::class, 'currentTerm'],
    ],
];
