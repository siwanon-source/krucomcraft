# KruComCraft Architecture

KruComCraft is now organized as a PHP MVC-style application that can run on XAMPP while keeping a clean migration path to Laravel.

## Current Runtime Flow

```text
index.php
  -> bootstrap/app.php
  -> App\Http\Kernel
  -> config/routes.php
  -> App\Http\Controllers\*
  -> App\Http\Requests\*
  -> App\Services\*
  -> App\Repositories\*
  -> src/components.php
  -> storage/*.json
```

## Layers

### Front Controller

`index.php` is intentionally small. It only boots the application and passes the request to `App\Http\Kernel`.

### Bootstrap

`bootstrap/app.php` starts sessions, registers the autoloader, and loads legacy-compatible view/data functions.

### Config

`config/routes.php` owns page/action routing.

`config/page_meta.php` owns hero title, gradient text, and page subtitles.

### HTTP Kernel

`app/Http/Kernel.php` validates requested pages, dispatches POST actions, and renders the final page.

### Controllers

Controllers coordinate requests and responses. They should not contain storage details or large business rules.

- `AuthController`
- `CourseController`
- `EnrollmentController`
- `GradeController`
- `PageController`

### Requests

Request classes normalize incoming form data before it enters services.

- `LoginRequest`
- `RegisterRequest`
- `CourseRequest`
- `EnrollmentRequest`
- `GradeRequest`

### Services

Services own business workflows.

- `AuthService`
- `CourseService`
- `EnrollmentService`
- `GradebookService`
- `PermissionService`

### Repositories

Repositories isolate data access. Current storage still uses JSON files, but this layer is where database-backed repositories should replace JSON later.

- `DataRepository`

### Views And Components

`src/components.php` contains the current PHP component/view functions. In Laravel this maps to Blade layouts, pages, and components.

## Storage

Current storage is JSON-based:

- `storage/users.json`
- `storage/custom_courses.json`
- `storage/enrollments.json`
- `storage/grades.json`
- `storage/audit_logs.json`

This is acceptable for the local prototype, but production should use MySQL with migrations.

## Laravel Migration Map

```text
app/Http/Controllers/*     -> Laravel controllers
app/Http/Requests/*        -> Laravel FormRequest classes
app/Services/*             -> Laravel app/Services
app/Repositories/*         -> Eloquent repositories or direct model queries
config/routes.php          -> routes/web.php
config/page_meta.php       -> config/page_meta.php or view composers
src/components.php         -> resources/views + Blade components
src/data.php seed arrays   -> database/seeders
storage/*.json             -> MySQL tables
```

## Target Database Tables

Core tables for production:

- users
- roles
- permissions
- role_user
- courses
- classrooms
- course_classroom
- students
- assignments
- qr_tokens
- grades
- grade_audit_logs
- media_items
- blog_posts
- portfolio_projects
- online_courses
- course_lessons
- enrollments
- payments
- bookings

## Enrollment Rules

Course access is separated by account type and course type.

- `school_student`: student account that belongs to a real classroom in the teacher's school.
- `public`: general learner account.

Course types:

- `school`: school subject/course taught by the teacher. Only `school_student` users can enroll.
- `public_free`: public course with no payment. Both `school_student` and `public` users can enroll.
- `public_paid`: public paid course. Both `school_student` and `public` users can enroll, but enrollment starts as `pending_payment`.

Enrollment status:

- `active`: school courses and public free courses.
- `pending_payment`: public paid courses until payment is confirmed.

## Module Ownership

- Courses and media use module color `c1`.
- QR grading and scores use module color `c2`.
- Blog and portfolio use module color `c3`.
- Paid courses, bookings, and payments use module color `c4`.
