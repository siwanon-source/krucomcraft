<?php
declare(strict_types=1);

function e(string|int|null $value): string
{
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

function app_root_path(string $path = ''): string
{
    return dirname(__DIR__, 2) . ($path !== '' ? DIRECTORY_SEPARATOR . ltrim(str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $path), DIRECTORY_SEPARATOR) : '');
}

function public_path(string $path = ''): string
{
    return app_root_path('public' . ($path !== '' ? DIRECTORY_SEPARATOR . ltrim(str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $path), DIRECTORY_SEPARATOR) : ''));
}

function asset_url(string $path): string
{
    $scriptDir = str_replace('\\', '/', dirname((string)($_SERVER['SCRIPT_NAME'] ?? '')));
    $prefix = str_ends_with($scriptDir, '/public') ? 'assets/' : 'public/assets/';
    return $prefix . ltrim($path, '/');
}

function icon(string $name): string
{
    $icons = [
        'dashboard' => '<path d="M3 11.5 12 4l9 7.5"></path><path d="M5 10.5V20h14v-9.5"></path><path d="M9 20v-6h6v6"></path>',
        'course' => '<path d="M4 19.5V5a2 2 0 0 1 2-2h12v18H6a2 2 0 0 1-2-1.5Z"></path><path d="M8 7h7"></path><path d="M8 11h8"></path>',
        'qr' => '<path d="M4 4h6v6H4z"></path><path d="M14 4h6v6h-6z"></path><path d="M4 14h6v6H4z"></path><path d="M14 14h2"></path><path d="M18 14h2v2"></path><path d="M20 18v2h-4"></path><path d="M14 18h1"></path>',
        'score' => '<path d="M9 11l2 2 4-5"></path><path d="M4 4h16v16H4z"></path><path d="M7 17h10"></path>',
        'media' => '<path d="M4 5h16v14H4z"></path><path d="M9 9l6 3-6 3z"></path>',
        'blog' => '<path d="M5 4h14v16H5z"></path><path d="M8 8h8"></path><path d="M8 12h8"></path><path d="M8 16h5"></path>',
        'portfolio' => '<path d="M4 7h16v13H4z"></path><path d="M9 7V5h6v2"></path><path d="M8 13h8"></path>',
        'paid' => '<path d="M4 6h16v12H4z"></path><path d="M8 10h4"></path><path d="M8 14h8"></path><path d="M17 10h1"></path>',
        'booking' => '<path d="M7 3v4"></path><path d="M17 3v4"></path><path d="M4 8h16"></path><path d="M5 5h14v15H5z"></path><path d="M9 13h2"></path><path d="M13 13h2"></path><path d="M9 17h2"></path>',
        'user' => '<path d="M12 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z"></path><path d="M4 21a8 8 0 0 1 16 0"></path>',
        'upload' => '<path d="M12 16V4"></path><path d="M7 9l5-5 5 5"></path><path d="M5 20h14"></path>',
        'lock' => '<path d="M7 11V8a5 5 0 0 1 10 0v3"></path><path d="M5 11h14v10H5z"></path>',
    ];
    return '<span class="svg-icon" aria-hidden="true"><svg viewBox="0 0 24 24">' . ($icons[$name] ?? $icons['dashboard']) . '</svg></span>';
}

function nav_items(): array
{
    return [
        'dashboard' => ['หน้าหลัก', 'dashboard'],
        'courses' => ['รายวิชา', 'course'],
        'qr-grading' => ['ตรวจงาน QR', 'qr'],
        'media' => ['สื่อการสอน', 'media'],
        'blog' => ['บทความ', 'blog'],
        'portfolio' => ['ผลงาน', 'portfolio'],
        'academy' => ['คอร์สเรียน', 'paid'],
        'booking' => ['นัดเรียน', 'booking'],
        'login' => ['เข้าสู่ระบบ', 'lock'],
        'register' => ['สมัครสมาชิก', 'user'],
        'profile' => ['โปรไฟล์', 'user'],
        'admin' => ['Admin', 'score'],
    ];
}

function render_layout(string $route, array $meta, array $data, ?string $flash): void
{
    ?><!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($meta['title']) ?> | KruComCraft</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700&family=Sarabun:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="icon" type="image/svg+xml" href="<?= e(asset_url('brand/KruComCraft_logo_mark.svg')) ?>">
    <link rel="stylesheet" href="<?= e(asset_url('css/app.css')) ?>?v=<?= e((string)filemtime(public_path('assets/css/app.css'))) ?>">
</head>
<body>
    <?php render_top_auth_action($route, $data); ?>
    <?php render_sticky_nav($route, $data); ?>
    <?php render_header_hero($meta); ?>
    <main class="page-shell">
        <?php if ($flash): ?><div class="flash"><?= e($flash) ?></div><?php endif; ?>
        <?php render_page($route, $data); ?>
    </main>
    <script src="<?= e(asset_url('js/app.js')) ?>"></script>
</body>
</html><?php
}

function render_header_hero(array $meta): void
{
    ?><header class="hero">
        <div class="hero-brand-lockup">
            <img src="<?= e(asset_url('brand/KruComCraft_logo_mark.svg')) ?>" alt="KruComCraft logo">
            <div>
                <h1 class="brand-title"><span class="brand-kru">Kru</span><span class="brand-com">Com</span><span class="brand-craft">Craft</span></h1>
                <div class="brand-micro">CODE <span></span> CREATE <span></span> CONNECT</div>
            </div>
        </div>
        <div class="hero-gradient"><?= e($meta['gradient']) ?></div>
        <p><?= e($meta['subtitle']) ?></p>
    </header><?php
}

function role_label(array $data, string $role): string
{
    return (string)($data['roles'][$role]['label'] ?? $role);
}

function avatar_src(array $user): string
{
    $avatar = (string)($user['avatar'] ?? '');
    if ($avatar !== '') {
        $normalized = str_starts_with($avatar, 'public/assets/') ? substr($avatar, strlen('public/assets/')) : str_replace('assets/', '', $avatar);
        return asset_url($normalized);
    }
    return asset_url('brand/default-profile.svg');
}

function render_top_auth_action(string $active, array $data): void
{
    $user = $data['current_user'];
    if (($user['role'] ?? 'guest') === 'guest') {
        ?><a class="top-login <?= $active === 'login' ? 'active' : '' ?>" href="?page=login"><?= icon('lock') ?><span>เข้าสู่ระบบ</span></a><?php
        return;
    }
    ?><div class="top-login logged-in">
        <img class="avatar-mini" src="<?= e(avatar_src($user)) ?>" width="30" height="30" alt="">
        <?php render_type_badge((string)($user['color'] ?? 'c1'), role_label($data, (string)$user['role'])); ?>
        <a href="?page=profile"><?= icon('user') ?><span>Profile</span></a>
        <form method="post">
            <input type="hidden" name="action" value="logout">
            <button type="submit"><?= icon('lock') ?><span>Logout</span></button>
        </form>
    </div><?php
}

function render_account_bar(array $data): void
{
    $user = $data['current_user'];
    $role = (string)$user['role'];
    ?><section class="account-bar card <?= e((string)($user['color'] ?? 'c1')) ?>">
        <div>
            <span class="eyebrow">Current User</span>
            <strong><?= e((string)$user['name']) ?></strong>
            <p><?= $user['email'] !== '' ? e((string)$user['email']) : 'Not logged in' ?></p>
        </div>
        <div class="account-actions">
            <?php render_type_badge((string)($user['color'] ?? 'c1'), role_label($data, $role)); ?>
            <?php if ($role !== 'guest'): ?>
                <form method="post">
                    <input type="hidden" name="action" value="logout">
                    <button class="button ghost" type="submit"><?= icon('lock') ?>Logout</button>
                </form>
            <?php else: ?>
                <a class="button ghost" href="?page=login"><?= icon('lock') ?>Login</a>
            <?php endif; ?>
        </div>
    </section><?php
}

function render_role_matrix(array $data): void
{
    render_section_label('Role Matrix', 'สิทธิ์ผู้ใช้งานในระบบ', 'Role ถูกผูกกับ session และตรวจ permission ก่อนทำ action สำคัญ');
    ?><section class="permission-grid">
        <?php foreach ($data['roles'] as $role => $config): ?>
            <article class="card feature-card <?= $role === 'admin' ? 'c4' : ($role === 'teacher' ? 'c2' : ($role === 'parent' ? 'c3' : 'c1')) ?>">
                <div class="card-icon"><?= icon($role === 'admin' ? 'lock' : ($role === 'teacher' ? 'score' : 'user')) ?></div>
                <h3><?= e($config['label']) ?></h3>
                <div class="chip-row">
                    <?php foreach ($config['permissions'] as $permission): ?><span><?= e($permission) ?></span><?php endforeach; ?>
                </div>
            </article>
        <?php endforeach; ?>
    </section><?php
}

function render_sticky_nav(string $active, array $data): void
{
    $user = $data['current_user'];
    $isGuest = ($user['role'] ?? 'guest') === 'guest';
    ?><nav class="sticky-nav" aria-label="Primary navigation">
        <div class="nav-inner">
            <a class="nav-brand" href="?page=dashboard" aria-label="KruComCraft home">
                <img src="<?= e(asset_url('brand/KruComCraft_logo_mark.svg')) ?>" alt="">
                <span>KruComCraft</span>
            </a>
            <div class="nav-links">
                <?php foreach (nav_items() as $route => [$label, $icon]): ?>
                    <?php if (in_array($route, ['login', 'register', 'profile', 'admin'], true)) continue; ?>
                    <a class="<?= $route === $active ? 'active' : '' ?>" href="?page=<?= e($route) ?>"><?= icon($icon) ?><span><?= e($label) ?></span></a>
                <?php endforeach; ?>
            </div>
            <div class="nav-actions">
                <?php if (!$isGuest): ?>
                    <?php render_type_badge((string)($user['color'] ?? 'c1'), role_label($data, (string)$user['role'])); ?>
                    <?php [$profileLabel, $profileIcon] = nav_items()['profile']; ?>
                    <a class="nav-admin <?= $active === 'profile' ? 'active' : '' ?>" href="?page=profile"><?= icon($profileIcon) ?><span><?= e($profileLabel) ?></span></a>
                    <?php if (kru_can('manage_courses', $user)): ?>
                        <?php [$adminLabel, $adminIcon] = nav_items()['admin']; ?>
                        <a class="nav-admin <?= $active === 'admin' ? 'active' : '' ?>" href="?page=admin"><?= icon($adminIcon) ?><span><?= e($adminLabel) ?></span></a>
                    <?php endif; ?>
                    <form method="post" class="nav-logout">
                        <input type="hidden" name="action" value="logout">
                        <button class="nav-admin" type="submit"><?= icon('lock') ?><span>Logout</span></button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </nav><?php
}

function render_section_label(string $label, string $title, string $text = ''): void
{
    ?><div class="section-label">
        <span><?= e($label) ?></span>
        <div>
            <h2><?= e($title) ?></h2>
            <?php if ($text !== ''): ?><p><?= e($text) ?></p><?php endif; ?>
        </div>
    </div><?php
}

function render_stat_card(string $class, string $iconName, string $label, string|int $value, string $meta): void
{
    ?><article class="card stat-card <?= e($class) ?>">
        <div class="card-icon"><?= icon($iconName) ?></div>
        <div>
            <p><?= e($label) ?></p>
            <strong><?= e($value) ?></strong>
            <span><?= e($meta) ?></span>
        </div>
    </article><?php
}

function render_feature_card(string $class, string $iconName, string $title, string $text, array $items): void
{
    ?><article class="card feature-card <?= e($class) ?>">
        <div class="card-icon"><?= icon($iconName) ?></div>
        <h3><?= e($title) ?></h3>
        <p><?= e($text) ?></p>
        <div class="chip-row">
            <?php foreach ($items as $item): ?><span><?= e($item) ?></span><?php endforeach; ?>
        </div>
    </article><?php
}

function render_type_badge(string $class, string $label): void
{
    ?><span class="type-badge <?= e($class) ?>"><?= e($label) ?></span><?php
}

function render_progress_bar(int $value): void
{
    $value = max(0, min(100, $value));
    ?><div class="progress" aria-label="Progress <?= $value ?> percent"><span style="width: <?= $value ?>%"></span></div><?php
}

function render_course_card(array $course): void
{
    ?><article class="card course-card <?= e($course['color']) ?>">
        <div class="course-top">
            <div class="course-code"><?= e($course['code']) ?></div>
            <?php render_type_badge('c1', $course['term'] ?? $course['classroom']); ?>
        </div>
        <h3><?= e($course['name']) ?></h3>
        <p><?= e($course['description'] ?? (($course['classroom'] ?? '') . ' · ' . ($course['students'] ?? 0) . ' คน')) ?></p>
        <div class="course-meta-grid">
            <span><strong>ระดับชั้น</strong><?= e($course['level'] ?? '-') ?></span>
            <span><strong>ห้องเรียน</strong><?= e($course['classroom'] ?? '-') ?></span>
            <span><strong>ครูผู้สอน</strong><?= e($course['teacher'] ?? 'KruComCraft') ?></span>
            <span><strong>นักเรียน</strong><?= e($course['students'] ?? 0) ?> คน</span>
            <span><strong>คาบ/สัปดาห์</strong><?= e($course['weekly_hours'] ?? '-') ?></span>
            <span><strong>งานค้าง</strong><?= e($course['pending'] ?? 0) ?> รายการ</span>
        </div>
        <div class="chip-row course-chip-row">
            <span><?= e($course['subject_group'] ?? 'คอมพิวเตอร์') ?></span>
            <span><?= e($course['status'] ?? 'เปิดสอน') ?></span>
            <span><?= e($course['visibility'] ?? 'นักเรียนในห้องเรียน') ?></span>
            <span><?= e($course['qr_enabled'] ?? 'QR ตรวจงาน') ?></span>
        </div>
        <?php if (!empty($course['objectives']) || !empty($course['assessment']) || !empty($course['media_policy'])): ?>
            <div class="course-detail-list">
                <?php if (!empty($course['objectives'])): ?><span><strong>เป้าหมาย</strong><?= e($course['objectives']) ?></span><?php endif; ?>
                <?php if (!empty($course['assessment'])): ?><span><strong>การวัดผล</strong><?= e($course['assessment']) ?></span><?php endif; ?>
                <?php if (!empty($course['media_policy'])): ?><span><strong>สื่อการสอน</strong><?= e($course['media_policy']) ?></span><?php endif; ?>
            </div>
        <?php endif; ?>
        <?php render_progress_bar((int)$course['progress']); ?>
    </article><?php
}

function course_level(array $course): string
{
    $level = (string)($course['level'] ?? '');
    if ($level !== '') {
        return $level;
    }
    $classroom = (string)($course['classroom'] ?? '');
    return $classroom !== '' ? explode('/', $classroom)[0] : '-';
}

function course_year(array $course): string
{
    $term = (string)($course['term'] ?? '');
    if (str_contains($term, '/')) {
        return explode('/', $term)[1];
    }
    return '2568';
}

function course_related_items(array $items, string $courseCode): array
{
    return array_values(array_filter($items, fn (array $item): bool => ($item['course'] ?? '') === $courseCode));
}

function render_course_learning_card(array $course, array $data): void
{
    $courseCode = (string)($course['code'] ?? '');
    $chapters = course_related_items($data['chapters'] ?? [], $courseCode);
    $assignments = course_related_items($data['assignments'] ?? [], $courseCode);
    $media = course_related_items($data['media'] ?? [], $courseCode);
    $grades = array_values(array_filter($data['grades'] ?? [], fn (array $grade): bool => str_starts_with((string)($grade['assignment'] ?? ''), 'ASN-')));

    ?><article class="card course-card c1 course-learning-card">
        <div class="course-top">
            <div class="course-code"><?= e($courseCode) ?></div>
            <?php render_type_badge('c1', 'เทอม ' . ($course['term'] ?? '-')); ?>
        </div>
        <h3><?= e((string)($course['name'] ?? '')) ?></h3>
        <p><?= e(course_level($course)) ?> · <?= e((string)($course['classroom'] ?? '-')) ?> · <?= e((int)($course['students'] ?? 0)) ?> คน</p>
        <div class="course-meta-grid">
            <span><strong>ปีการศึกษา</strong><?= e(course_year($course)) ?></span>
            <span><strong>ภาคเรียน</strong><?= e((string)($course['term'] ?? '-')) ?></span>
            <span><strong>ระดับชั้น</strong><?= e(course_level($course)) ?></span>
            <span><strong>ห้องเรียน</strong><?= e((string)($course['classroom'] ?? '-')) ?></span>
        </div>
        <div class="course-detail-list">
            <span><strong>Course Detail</strong><?= e((string)($course['description'] ?? 'รายวิชาคอมพิวเตอร์สำหรับการเรียนรู้ตามภาคเรียน')) ?></span>
            <span><strong>Unit List</strong><?= count($chapters) > 0 ? e(implode(' · ', array_map(fn ($item) => (string)$item['title'], $chapters))) : 'ยังไม่มีหน่วยการเรียนรู้' ?></span>
            <span><strong>Lesson List</strong><?= count($chapters) > 0 ? e(implode(' · ', array_map(fn ($item) => (string)$item['type'], $chapters))) : 'รอเพิ่มบทเรียน' ?></span>
            <span><strong>Assignments</strong><?= count($assignments) > 0 ? e(implode(' · ', array_map(fn ($item) => (string)$item['title'], $assignments))) : 'ยังไม่มีงานที่มอบหมาย' ?></span>
            <span><strong>Media</strong><?= count($media) > 0 ? e(implode(' · ', array_map(fn ($item) => (string)$item['title'], $media))) : 'ยังไม่มีสื่อการสอน' ?></span>
            <span><strong>Score Summary</strong>งานค้าง <?= e((int)($course['pending'] ?? 0)) ?> รายการ · บันทึกคะแนน <?= e(count($grades)) ?> รายการ</span>
        </div>
        <?php render_progress_bar((int)($course['progress'] ?? 0)); ?>
    </article><?php
}

function school_course_sort_key(string $term): string
{
    if (str_contains($term, '/')) {
        [$semester, $year] = array_pad(explode('/', $term, 2), 2, '0');
        return sprintf('%04d%02d', (int)$year, (int)$semester);
    }
    return $term;
}

function school_course_lessons(array $course, array $data): array
{
    $courseCode = (string)($course['code'] ?? '');
    $rows = [];

    foreach (course_related_items($data['chapters'] ?? [], $courseCode) as $chapter) {
        $rows[] = [
            'title' => (string)($chapter['title'] ?? 'บทเรียน'),
            'type' => (string)($chapter['type'] ?? 'Slide'),
        ];
    }
    foreach (course_related_items($data['media'] ?? [], $courseCode) as $item) {
        $rows[] = [
            'title' => (string)($item['title'] ?? 'สื่อการสอน'),
            'type' => (string)($item['type'] ?? 'PDF'),
        ];
    }
    foreach (course_related_items($data['assignments'] ?? [], $courseCode) as $assignment) {
        $rows[] = [
            'title' => (string)($assignment['title'] ?? 'ใบงาน'),
            'type' => 'งาน',
        ];
    }

    if (count($rows) === 0) {
        $name = (string)($course['name'] ?? '');
        if (str_contains(strtolower($courseCode . ' ' . $name), 'ai')) {
            $rows = [
                ['title' => 'รู้จัก AI และการใช้งานอย่างรับผิดชอบ', 'type' => 'Slide'],
                ['title' => 'Prompt เบื้องต้นสำหรับงานเรียน', 'type' => 'Video'],
                ['title' => 'ฝึกใช้ AI วิเคราะห์โจทย์', 'type' => 'Lab'],
                ['title' => 'สรุปผลและสะท้อนคิด', 'type' => 'PDF'],
                ['title' => 'ชิ้นงาน AI สำหรับห้องเรียน', 'type' => 'งาน'],
            ];
        } elseif (str_contains(strtolower($courseCode . ' ' . $name), 'rob')) {
            $rows = [
                ['title' => 'ความรู้พื้นฐานหุ่นยนต์', 'type' => 'Video'],
                ['title' => 'ไมโครคอนโทรลเลอร์และเซนเซอร์', 'type' => 'Slide'],
                ['title' => 'Sensor และ Actuator', 'type' => 'Lab'],
                ['title' => 'การควบคุมการเคลื่อนที่', 'type' => 'PDF'],
                ['title' => 'โปรเจกต์หุ่นยนต์', 'type' => 'งาน'],
            ];
        } elseif (str_contains(strtolower($courseCode . ' ' . $name), 'web')) {
            $rows = [
                ['title' => 'โครงสร้างหน้าเว็บ HTML', 'type' => 'Slide'],
                ['title' => 'จัดรูปแบบด้วย CSS', 'type' => 'Video'],
                ['title' => 'Responsive Layout', 'type' => 'Lab'],
                ['title' => 'แบบฝึกออกแบบหน้าเว็บ', 'type' => 'PDF'],
                ['title' => 'Portfolio Website', 'type' => 'งาน'],
            ];
        } else {
            $rows = [
                ['title' => 'หลักการคิดเชิงคำนวณ', 'type' => 'Slide'],
                ['title' => 'อัลกอริทึมและ Flowchart', 'type' => 'PDF'],
                ['title' => 'การเขียนโปรแกรมแบบลำดับ', 'type' => 'Video'],
                ['title' => 'ใบงานแก้ปัญหาในชีวิตประจำวัน', 'type' => 'Lab'],
                ['title' => 'ชิ้นงานสรุปหน่วยการเรียนรู้', 'type' => 'งาน'],
            ];
        }
    }

    return array_slice($rows, 0, 5);
}

function school_type_badge_class(string $type): string
{
    return match (strtolower($type)) {
        'video' => 'c2',
        'lab', 'งาน', 'quiz' => 'c4',
        'pdf' => 'c3',
        default => 'c1',
    };
}

function render_school_course_card(array $course, array $data, int $index): void
{
    $classes = ['c1', 'c2', 'c3', 'c4'];
    $color = $classes[$index % count($classes)];
    $lessons = school_course_lessons($course, $data);
    $courseCode = (string)($course['code'] ?? '');
    $level = course_level($course);
    $weeks = max(5, count($lessons));
    $credit = (string)($course['credit'] ?? '1.0 หน่วยกิต');
    $progress = (int)($course['progress'] ?? 0);

    ?><article class="school-course-card <?= e($color) ?>">
        <div class="school-course-stripe"></div>
        <div class="school-course-head">
            <div class="school-course-icon"><?= icon($index % 2 === 0 ? 'course' : 'media') ?></div>
            <div>
                <div class="course-code"><?= e($courseCode) ?></div>
                <h3><?= e((string)($course['name'] ?? 'รายวิชา')) ?></h3>
            </div>
        </div>
        <div class="school-course-meta">
            <span><?= e($level) ?></span>
            <span><?= e($weeks) ?> บท</span>
            <span><?= e($credit) ?></span>
        </div>
        <div class="school-lesson-list">
            <?php foreach ($lessons as $lessonIndex => $lesson): ?>
                <div class="school-lesson-row">
                    <span class="school-lesson-no"><?= e($lessonIndex + 1) ?></span>
                    <span><?= e((string)$lesson['title']) ?></span>
                    <?php render_type_badge(school_type_badge_class((string)$lesson['type']), (string)$lesson['type']); ?>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="school-progress-row">
            <span>ความคืบหน้า</span>
            <strong><?= e($progress) ?>%</strong>
        </div>
        <div class="school-card-footer">
            <?php render_progress_bar($progress); ?>
            <a class="button ghost" href="?page=learn&course=<?= e($courseCode) ?>"><?= icon('course') ?>เปิดวิชา</a>
        </div>
    </article><?php
}

function page_school_student_courses(array $data): void
{
    $courses = array_values($data['courses'] ?? []);
    $terms = [];
    foreach ($courses as $course) {
        $term = (string)($course['term'] ?? '');
        if ($term !== '') {
            $terms[$term] = $term;
        }
    }
    uksort($terms, fn (string $a, string $b): int => school_course_sort_key($b) <=> school_course_sort_key($a));

    $currentTerm = kru_current_term($courses);
    $activeTerm = (string)($_GET['term'] ?? '');
    if ($activeTerm === '' || !isset($terms[$activeTerm])) {
        $activeTerm = isset($terms[$currentTerm]) ? $currentTerm : (string)array_key_first($terms);
    }
    $isCurrentTerm = $activeTerm === $currentTerm;

    $termCourses = array_values(array_filter($courses, fn (array $course): bool => (string)($course['term'] ?? '') === $activeTerm));
    $lessonTotal = array_sum(array_map(fn (array $course): int => count(school_course_lessons($course, $data)), $termCourses));
    $videoTotal = array_sum(array_map(fn (array $course): int => count(array_filter(school_course_lessons($course, $data), fn (array $lesson): bool => strtolower((string)$lesson['type']) === 'video')), $termCourses));
    $labTotal = array_sum(array_map(fn (array $course): int => count(array_filter(school_course_lessons($course, $data), fn (array $lesson): bool => in_array(strtolower((string)$lesson['type']), ['lab', 'งาน', 'quiz'], true))), $termCourses));

    ?><section class="school-term-shell">
        <div class="school-term-hero">
            <div class="school-term-status <?= $isCurrentTerm ? 'is-current' : '' ?>">
                <span class="school-term-status-icon"><?= icon('course') ?></span>
                <span class="school-term-status-copy">
                    <strong>ภาคเรียนที่ <?= e($activeTerm) ?></strong>
                    <?php if ($isCurrentTerm): ?><small>กำลังดำเนินการ</small><?php endif; ?>
                </span>
            </div>
            <h2>สื่อการสอน</h2>
            <div class="hero-gradient">กลุ่มสาระการเรียนรู้วิทยาศาสตร์และเทคโนโลยี</div>
            <p>รวมสื่อ เอกสาร กิจกรรมการเรียนรู้ และรายวิชาที่นักเรียนในโรงเรียนเข้าถึงได้ตามภาคเรียน</p>
            <nav class="school-term-menu" aria-label="ภาคเรียน">
                <?php foreach (array_values($terms) as $term): ?>
                    <a class="<?= $term === $activeTerm ? 'active' : '' ?> <?= $term === $currentTerm ? 'current' : '' ?>" href="?page=courses&term=<?= e($term) ?>">
                        <span>ภาคเรียน</span>
                        <strong><?= e($term) ?></strong>
                        <?php if ($term === $currentTerm): ?><small>ปัจจุบัน</small><?php endif; ?>
                    </a>
                <?php endforeach; ?>
            </nav>
        </div>
        <section class="stats-grid school-stats">
            <?php render_stat_card('c1', 'course', 'รายวิชา', count($termCourses), 'รายวิชาของภาคเรียน'); ?>
            <?php render_stat_card('c2', 'blog', 'สื่อการสอน', $lessonTotal, 'เอกสารและกิจกรรม'); ?>
            <?php render_stat_card('c3', 'media', 'วิดีโอ', $videoTotal, 'คลิปการสอน'); ?>
            <?php render_stat_card('c4', 'score', 'ใบงาน / Lab', $labTotal, 'งานฝึกและกิจกรรม'); ?>
        </section>
        <div class="school-section-head">
            <h2>รายวิชาทั้งหมด</h2>
            <span><?= e(count($termCourses)) ?> วิชา</span>
        </div>
        <?php if (count($termCourses) === 0): ?>
            <article class="card c1"><h3>ยังไม่มีรายวิชาในเทอมนี้</h3><p>เมื่อครูเพิ่มรายวิชา ระบบจะแสดงแยกตามเทอมให้อัตโนมัติ</p></article>
        <?php else: ?>
            <section class="school-course-grid">
                <?php foreach ($termCourses as $index => $course) render_school_course_card($course, $data, $index); ?>
            </section>
        <?php endif; ?>
        <p class="school-term-note">กลุ่มสาระการเรียนรู้วิทยาศาสตร์และเทคโนโลยี · ภาคเรียนที่ <?= e($activeTerm) ?></p>
    </section><?php
}

function page_guest_courses(array $data): void
{
    $terms = array_values(array_unique(array_map(fn (array $course): string => (string)($course['term'] ?? ''), $data['courses'] ?? [])));
    rsort($terms);
    $schoolCount = count($data['courses'] ?? []);
    $publicCount = count(array_filter($data['academy'] ?? [], fn (array $course): bool => ($course['type'] ?? '') !== 'school'));

    render_section_label(
        'Course Access',
        'รายวิชาของนักเรียนต้องเข้าสู่ระบบก่อน',
        'ระบบแยกเส้นทางชัดเจน: นักเรียนในโรงเรียนเข้าสู่ระบบเพื่อดูรายวิชาตามเทอมและห้องเรียน ส่วนบุคคลทั่วไปไปที่คอร์สเรียนสาธารณะ'
    );
    ?><section class="course-access-grid">
        <article class="card c1 course-access-card">
            <div class="card-icon"><?= icon('course') ?></div>
            <div>
                <h3>นักเรียนในโรงเรียน</h3>
                <p>เข้าสู่ระบบด้วยบัญชีนักเรียน แล้วระบบจะพาไปหน้ารายวิชาทันที แสดงแยกตามภาคเรียน เช่น เทอม <?= e($terms[0] ?? '2/2568') ?> พร้อมสื่อ ใบงาน และความคืบหน้า</p>
                <div class="chip-row">
                    <span><?= e($schoolCount) ?> รายวิชาในระบบ</span>
                    <span>ล็อกตาม role และห้องเรียน</span>
                </div>
                <div class="course-actions">
                    <a class="button" href="?page=login"><?= icon('lock') ?>เข้าสู่ระบบนักเรียน</a>
                    <a class="button ghost" href="?page=register"><?= icon('user') ?>สมัครบัญชีนักเรียน</a>
                </div>
            </div>
        </article>
        <article class="card c4 course-access-card">
            <div class="card-icon"><?= icon('paid') ?></div>
            <div>
                <h3>บุคคลทั่วไป</h3>
                <p>ดูและลงทะเบียนคอร์สออนไลน์สาธารณะได้ ทั้งคอร์สฟรีและคอร์สเสียเงิน แต่ไม่สามารถเข้าเรียนรายวิชาที่ครูสอนในโรงเรียนได้</p>
                <div class="chip-row">
                    <span><?= e($publicCount) ?> คอร์สสาธารณะ</span>
                    <span>ฟรี / ชำระเงิน</span>
                </div>
                <div class="course-actions">
                    <a class="button" href="?page=academy"><?= icon('paid') ?>ดูคอร์สเรียน</a>
                    <a class="button ghost" href="?page=register"><?= icon('user') ?>สมัครบุคคลทั่วไป</a>
                </div>
            </div>
        </article>
    </section>
    <section class="stats-grid">
        <?php render_stat_card('c1', 'course', 'หลัง Login', 'รายวิชา', 'นักเรียนไปหน้าเทอมอัตโนมัติ'); ?>
        <?php render_stat_card('c2', 'lock', 'ก่อน Login', 'Access Gate', 'ยังไม่เห็นรายละเอียดในห้องเรียน'); ?>
        <?php render_stat_card('c3', 'media', 'สื่อการสอน', 'Sync', 'เชื่อมเอกสาร สไลด์ VDO และใบงาน'); ?>
        <?php render_stat_card('c4', 'score', 'Progress', 'จริง', 'คำนวณจากกิจกรรมที่เรียนแล้ว'); ?>
    </section><?php
}

function render_chapter_row(array $chapter): void
{
    ?><article class="chapter-row">
        <div>
            <?php render_type_badge('c1', $chapter['course']); ?>
            <h3><?= e($chapter['title']) ?></h3>
            <p><?= e($chapter['type']) ?> · ความก้าวหน้า <?= e($chapter['progress']) ?>%</p>
        </div>
        <div class="row-progress"><?php render_progress_bar((int)$chapter['progress']); ?></div>
    </article><?php
}

function render_academy_sections(array $data, bool $compact = false): void
{
    $schoolCourses = array_values(array_filter($data['academy'], fn (array $course): bool => ($course['type'] ?? '') === 'school'));
    $freeCourses = array_values(array_filter($data['academy'], fn (array $course): bool => ($course['type'] ?? '') === 'public_free'));
    $paidCourses = array_values(array_filter($data['academy'], fn (array $course): bool => ($course['type'] ?? '') === 'public_paid'));

    render_section_label('School Courses', 'คอร์สสำหรับนักเรียนในโรงเรียน', 'เฉพาะนักเรียนในโรงเรียนที่ครูสอน เข้าถึงจากรายวิชาและห้องเรียนที่ผูกไว้');
    ?><section class="course-grid"><?php foreach ($schoolCourses as $course): ?>
        <article class="card course-card c1">
            <div class="course-top">
                <div class="course-code"><?= e($course['code']) ?></div>
                <?php render_type_badge('c1', 'School only'); ?>
            </div>
            <h3><?= e($course['name']) ?></h3>
            <p><?= e($course['audience']) ?> · <?= e($course['enrollment']) ?></p>
            <div class="chip-row">
                <span><?= e($course['price']) ?></span>
                <span><?= e($course['access_note']) ?></span>
            </div>
            <?php render_course_enroll_action($course, $data); ?>
            <?php if (!$compact): ?><?php render_progress_bar((int)$course['progress']); ?><?php endif; ?>
        </article>
    <?php endforeach; ?></section>

    <?php render_section_label('Public Free Courses', 'คอร์สทั่วไปแบบไม่เสียเงิน', 'นักเรียนในโรงเรียนและบุคคลทั่วไปลงทะเบียนได้ เข้าเรียนได้ทันทีหลังสมัครสมาชิก'); ?>
    <section class="course-grid"><?php foreach ($freeCourses as $course): ?>
        <article class="card course-card c4">
            <div class="course-top">
                <div class="course-code"><?= e($course['code']) ?></div>
                <?php render_type_badge('c4', $course['price']); ?>
            </div>
            <h3><?= e($course['name']) ?></h3>
            <p><?= e($course['audience']) ?> · <?= e($course['enrollment']) ?></p>
            <div class="chip-row">
                <span><?= e($course['access_note']) ?></span>
                <span>Open access</span>
            </div>
            <?php render_course_enroll_action($course, $data); ?>
            <?php if (!$compact): ?><?php render_progress_bar((int)$course['progress']); ?><?php endif; ?>
        </article>
    <?php endforeach; ?></section>

    <?php render_section_label('Public Paid Courses', 'คอร์สทั่วไปแบบเสียเงิน', 'นักเรียนในโรงเรียนและบุคคลทั่วไปลงทะเบียนได้ แต่ต้องชำระเงินก่อนเปิดบทเรียน'); ?>
    <section class="course-grid"><?php foreach ($paidCourses as $course): ?>
        <article class="card course-card c4">
            <div class="course-top">
                <div class="course-code"><?= e($course['code']) ?></div>
                <?php render_type_badge('c4', $course['price']); ?>
            </div>
            <h3><?= e($course['name']) ?></h3>
            <p><?= e($course['audience']) ?> · <?= e($course['enrollment']) ?></p>
            <div class="chip-row">
                <span><?= e($course['access_note']) ?></span>
                <span>Payment required</span>
            </div>
            <?php render_course_enroll_action($course, $data); ?>
            <?php if (!$compact): ?><?php render_progress_bar((int)$course['progress']); ?><?php endif; ?>
        </article>
    <?php endforeach; ?></section><?php
}

function render_course_enroll_action(array $course, array $data): void
{
    $user = $data['current_user'];
    $isGuest = ($user['role'] ?? 'guest') === 'guest';
    $already = false;
    $enrollmentStatus = '';
    foreach ($data['enrollments'] ?? [] as $enrollment) {
        if (($enrollment['email'] ?? '') === ($user['email'] ?? '') && ($enrollment['course_code'] ?? '') === ($course['code'] ?? '')) {
            $already = true;
            $enrollmentStatus = (string)($enrollment['status'] ?? '');
            break;
        }
    }

    ?><div class="course-actions"><?php
    if ($already) {
        if ($enrollmentStatus === 'active') {
            ?><a class="button" href="?page=learn&course=<?= e($course['code'] ?? '') ?>"><?= icon('course') ?>เข้าสู่คอร์ส</a><?php
        } else {
            render_type_badge('c4', 'รอชำระเงิน');
        }
    } elseif ($isGuest) {
        ?><a class="button ghost" href="?page=register"><?= icon('user') ?>สมัครเพื่อเรียน</a><?php
    } elseif (($course['type'] ?? '') === 'school' && (($user['user_type'] ?? '') !== 'school_student')) {
        render_type_badge('c1', 'เฉพาะนักเรียนใน class');
    } else {
        ?><form method="post">
            <input type="hidden" name="action" value="enroll_course">
            <input type="hidden" name="course_code" value="<?= e($course['code']) ?>">
            <button class="button" type="submit"><?= icon('paid') ?><?= ($course['type'] ?? '') === 'public_paid' ? 'ลงทะเบียนและรอชำระเงิน' : 'ลงทะเบียนเรียน' ?></button>
        </form><?php
    }
    ?></div><?php
}

function render_page(string $route, array $data): void
{
    match ($route) {
        'courses' => page_courses($data),
        'qr-grading' => page_qr($data),
        'media' => page_media($data),
        'blog' => page_blog($data),
        'portfolio' => page_portfolio($data),
        'academy' => page_academy($data),
        'learn' => page_learn($data),
        'booking' => page_booking($data),
        'login' => page_login($data),
        'register' => page_register($data),
        'profile' => page_profile($data),
        'admin' => page_admin($data),
        default => page_dashboard($data),
    };
}

function page_dashboard(array $data): void
{
    ?><section class="stats-grid">
        <?php render_stat_card('c1', 'course', 'คอร์สในโรงเรียน', count(array_filter($data['academy'], fn (array $course): bool => ($course['type'] ?? '') === 'school')), 'เฉพาะนักเรียนที่ผูกกับห้องเรียน'); ?>
        <?php render_stat_card('c4', 'media', 'คอร์สฟรีทั่วไป', count(array_filter($data['academy'], fn (array $course): bool => ($course['type'] ?? '') === 'public_free')), 'นักเรียนและบุคคลทั่วไปลงได้'); ?>
        <?php render_stat_card('c4', 'paid', 'คอร์สเสียเงิน', count(array_filter($data['academy'], fn (array $course): bool => ($course['type'] ?? '') === 'public_paid')), 'ลงทะเบียนและชำระเงิน'); ?>
        <?php render_stat_card('c4', 'booking', 'นัดเรียนตัวต่อตัว', count($data['bookings']), 'เลือกเวลาเรียนส่วนตัว'); ?>
    </section>
    <?php render_academy_sections($data, true); ?>
    <?php render_section_label('Student Area', 'นักเรียนในโรงเรียนดูรายวิชาตามเทอมได้', 'ถ้าเป็นนักเรียนที่เข้ามาหาดูรายวิชา ให้ไปที่เมนูรายวิชาเพื่อดูแยกตามเทอมการศึกษา'); ?>
    <section class="feature-grid">
        <?php render_feature_card('c1', 'course', 'รายวิชาตามเทอม', 'แสดงรายวิชาแยกตามเทอมการศึกษา ห้องเรียน งานค้าง และความก้าวหน้า', ['เทอม 2/2568', 'เทอม 1/2568', 'Classroom']); ?>
        <?php render_feature_card('c2', 'qr', 'ตรวจงาน QR และคะแนน', 'นักเรียนส่งงาน ครูสแกน QR ตรวจและบันทึกคะแนนพร้อม audit log', ['QR', 'Gradebook', 'Audit']); ?>
        <?php render_feature_card('c3', 'portfolio', 'ผลงานก่อนเรียน', 'ดูบทความและผลงานที่ผ่านมาเพื่อประกอบการตัดสินใจลงทะเบียน', ['Blog', 'Portfolio', 'Project']); ?>
    </section><?php
}

function page_courses(array $data): void
{
    $user = $data['current_user'];
    if (($user['role'] ?? 'guest') === 'guest') {
        page_guest_courses($data);
        return;
    }

    if (($user['user_type'] ?? '') === 'school_student') {
        page_school_student_courses($data);
        return;
    }

    $yearFilter = (string)($_GET['year'] ?? '');
    $termFilter = (string)($_GET['term'] ?? '');
    $levelFilter = (string)($_GET['level'] ?? '');
    $classroomFilter = (string)($_GET['classroom'] ?? '');
    $isSchoolStudent = (($user['user_type'] ?? '') === 'school_student');
    $userClassroom = (string)($user['classroom'] ?? '');

    $visibleCourses = array_values(array_filter($data['courses'], function (array $course) use ($isSchoolStudent, $userClassroom): bool {
        if (!$isSchoolStudent || $userClassroom === '') {
            return true;
        }
        return ($course['classroom'] ?? '') === $userClassroom;
    }));

    if ($isSchoolStudent && count($visibleCourses) === 0) {
        $visibleCourses = $data['courses'];
    }

    $visibleCourses = array_values(array_filter($visibleCourses, function (array $course) use ($yearFilter, $termFilter, $levelFilter, $classroomFilter): bool {
        if ($yearFilter !== '' && course_year($course) !== $yearFilter) return false;
        if ($termFilter !== '' && ($course['term'] ?? '') !== $termFilter) return false;
        if ($levelFilter !== '' && course_level($course) !== $levelFilter) return false;
        if ($classroomFilter !== '' && ($course['classroom'] ?? '') !== $classroomFilter) return false;
        return true;
    }));

    $years = array_values(array_unique(array_map('course_year', $data['courses'])));
    rsort($years);
    $terms = array_values(array_unique(array_map(fn (array $course): string => (string)($course['term'] ?? ''), $data['courses'])));
    rsort($terms);
    $currentTerm = kru_current_term($data['courses']);
    $levels = array_values(array_unique(array_map('course_level', $data['courses'])));
    sort($levels);
    $classrooms = array_values(array_unique(array_map(fn (array $course): string => (string)($course['classroom'] ?? ''), $data['courses'])));
    sort($classrooms);

    render_section_label('Student Courses', 'รายวิชาตามโครงสร้างภาคเรียน', 'จัดตามปีการศึกษา ภาคเรียน ระดับชั้น ห้องเรียน พร้อม Course Detail, Unit, Lesson, Assignments, Media และ Score Summary');
    ?><section class="card c1 course-filter-card">
        <form method="get" class="form-grid">
            <input type="hidden" name="page" value="courses">
            <label>ปีการศึกษา<select name="year"><option value="">ทั้งหมด</option><?php foreach ($years as $year): ?><option value="<?= e($year) ?>" <?= $yearFilter === $year ? 'selected' : '' ?>><?= e($year) ?></option><?php endforeach; ?></select></label>
            <label>ภาคเรียน<select name="term"><option value="">ทั้งหมด</option><?php foreach ($terms as $term): ?><option value="<?= e($term) ?>" <?= $termFilter === $term ? 'selected' : '' ?>><?= e($term) ?></option><?php endforeach; ?></select></label>
            <label>ระดับชั้น<select name="level"><option value="">ทั้งหมด</option><?php foreach ($levels as $level): ?><option value="<?= e($level) ?>" <?= $levelFilter === $level ? 'selected' : '' ?>><?= e($level) ?></option><?php endforeach; ?></select></label>
            <label>ห้องเรียน<select name="classroom"><option value="">ทั้งหมด</option><?php foreach ($classrooms as $classroom): ?><option value="<?= e($classroom) ?>" <?= $classroomFilter === $classroom ? 'selected' : '' ?>><?= e($classroom) ?></option><?php endforeach; ?></select></label>
            <button class="button" type="submit"><?= icon('course') ?>กรองรายวิชา</button>
            <a class="button ghost" href="?page=courses"><?= icon('dashboard') ?>ล้างตัวกรอง</a>
        </form>
        <?php if (kru_can('manage_courses', $user)): ?>
            <form method="post" class="current-term-form">
                <input type="hidden" name="action" value="set_current_term">
                <label>เทอมปัจจุบัน
                    <select name="current_term">
                        <?php foreach ($terms as $term): ?>
                            <option value="<?= e($term) ?>" <?= $term === $currentTerm ? 'selected' : '' ?>><?= e($term) ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <button class="button" type="submit"><?= icon('score') ?>ตั้งเป็นเทอมปัจจุบัน</button>
            </form>
        <?php endif; ?>
    </section>
    <section class="stats-grid">
        <?php render_stat_card('c1', 'course', 'รายวิชาที่เห็น', count($visibleCourses), $isSchoolStudent ? 'มุมมองนักเรียนใน class' : 'มุมมองรวม'); ?>
        <?php render_stat_card('c1', 'media', 'ห้องเรียน', count($classrooms), 'กรองตามห้องได้'); ?>
        <?php render_stat_card('c2', 'score', 'งานทั้งหมด', count($data['assignments']), 'เชื่อมกับรายวิชา'); ?>
        <?php render_stat_card('c3', 'portfolio', 'สื่อการสอน', count($data['media']), 'เอกสาร/สไลด์/VDO'); ?>
    </section><?php

    $coursesByTerm = [];
    foreach ($visibleCourses as $course) {
        $term = (string)($course['term'] ?? 'ไม่ระบุเทอม');
        $coursesByTerm[$term][] = $course;
    }
    krsort($coursesByTerm);

    if (count($visibleCourses) === 0) {
        render_section_label('No Courses', 'ไม่พบรายวิชาตามตัวกรอง', 'ลองเปลี่ยนปีการศึกษา ภาคเรียน ระดับชั้น หรือห้องเรียน');
        return;
    }

    foreach ($coursesByTerm as $term => $courses) {
        render_section_label('Term ' . $term, 'เทอม ' . $term, count($courses) . ' รายวิชา');
        ?><section class="course-grid"><?php foreach ($courses as $course) render_course_learning_card($course, $data); ?></section><?php
    }
    render_section_label('Latest Lessons', 'บทเรียนและใบงานล่าสุด');
    ?><section class="stack"><?php foreach ($data['chapters'] as $chapter) render_chapter_row($chapter); ?></section><?php
}

function page_qr(array $data): void
{
    render_section_label('QR Scanner', 'สแกน QR เพื่อตรวจงาน', 'ต้นแบบนี้รองรับการกรอก QR token และบันทึกคะแนนลง JSON พร้อม audit log');
    ?><section class="split">
        <article class="card scanner-card c2">
            <div class="scan-frame"><?= icon('qr') ?><span>KCC QR Scanner</span></div>
            <form method="post" class="form-grid">
                <input type="hidden" name="action" value="save_grade">
                <label>นักเรียน<select name="student"><?php foreach ($data['students'] as $student): ?><option value="<?= e($student['id']) ?>"><?= e($student['name']) ?> · <?= e($student['qr']) ?></option><?php endforeach; ?></select></label>
                <label>งาน<select name="assignment"><?php foreach ($data['assignments'] as $assignment): ?><option value="<?= e($assignment['id']) ?>"><?= e($assignment['title']) ?> · <?= e($assignment['qr']) ?></option><?php endforeach; ?></select></label>
                <label>คะแนน<input name="score" type="number" min="0" max="100" value="10"></label>
                <label>สถานะ<select name="status"><option>ผ่าน</option><option>รอตรวจซ้ำ</option><option>ส่งช้า</option><option>ยังไม่ผ่าน</option></select></label>
                <label class="wide">หมายเหตุ<input name="note" type="text" placeholder="เช่น ส่งตรงเวลา / ต้องแก้ไขส่วน..."></label>
                <button class="button" type="submit"><?= icon('score') ?>บันทึกคะแนน</button>
            </form>
        </article>
        <article class="card c2">
            <h3>Audit log ล่าสุด</h3>
            <div class="timeline"><?php foreach ($data['audit_logs'] as $log): ?><div><strong><?= e($log['time']) ?></strong><span><?= e($log['event']) ?></span></div><?php endforeach; ?></div>
        </article>
    </section><?php
}

function page_media(array $data): void
{
    render_section_label('Media Library', 'คลังสื่อแยกตามรายวิชา', 'รองรับเอกสาร รูปภาพ วิดีโอ และสิทธิ์การเข้าถึง');
    ?><section class="feature-grid"><?php foreach ($data['media'] as $item): ?>
        <article class="card feature-card c1">
            <div class="card-icon"><?= icon('media') ?></div>
            <h3><?= e($item['title']) ?></h3>
            <p><?= e($item['course']) ?> · <?= e($item['access']) ?></p>
            <?php render_type_badge('c1', $item['type']); ?>
        </article>
    <?php endforeach; ?></section><?php
}

function page_blog(array $data): void
{
    render_section_label('Blog', 'บทความล่าสุด', 'หมวด Computer, Coding, AI, Robotics และ Digital Learning');
    ?><section class="feature-grid"><?php foreach ($data['posts'] as $post): ?>
        <article class="card feature-card c3">
            <div class="card-icon"><?= icon('blog') ?></div>
            <?php render_type_badge('c3', $post['tag']); ?>
            <h3><?= e($post['title']) ?></h3>
            <p><?= e($post['date']) ?> · KruComCraft</p>
        </article>
    <?php endforeach; ?></section><?php
}

function page_portfolio(array $data): void
{
    render_section_label('Portfolio', 'ผลงานครูและนักเรียน', 'แสดงผลลัพธ์จากห้องเรียนและกิจกรรมที่ผ่านมา');
    ?><section class="feature-grid"><?php foreach ($data['projects'] as $project): ?>
        <article class="card feature-card c3">
            <div class="card-icon"><?= icon('portfolio') ?></div>
            <h3><?= e($project['title']) ?></h3>
            <p><?= e($project['result']) ?></p>
            <?php render_type_badge('c3', $project['year']); ?>
        </article>
    <?php endforeach; ?></section><?php
}

function page_academy(array $data): void
{
    render_academy_sections($data);
}

function page_learn(array $data): void
{
    $courseCode = strtoupper(trim((string)($_GET['course'] ?? '')));
    $course = null;
    foreach ($data['academy'] as $item) {
        if (($item['code'] ?? '') === $courseCode) {
            $course = $item;
            break;
        }
    }
    if ($course === null) {
        foreach ($data['courses'] as $item) {
            if (($item['code'] ?? '') === $courseCode) {
                $course = $item + [
                    'type' => 'school',
                    'price' => 'ไม่มีค่าใช้จ่าย',
                    'color' => 'c1',
                    'audience' => 'เฉพาะนักเรียนในโรงเรียน',
                    'enrollment' => 'เปิดจากรายวิชาในภาคเรียน',
                ];
                break;
            }
        }
    }

    $user = $data['current_user'];
    $enrollment = null;
    foreach ($data['enrollments'] ?? [] as $item) {
        if (($item['email'] ?? '') === ($user['email'] ?? '') && ($item['course_code'] ?? '') === $courseCode) {
            $enrollment = $item;
            break;
        }
    }
    $isSchoolCourse = (($course['type'] ?? '') === 'school');
    if ($isSchoolCourse && (($user['user_type'] ?? '') === 'school_student')) {
        $enrollment = ['status' => 'active'];
    }

    if ($course === null) {
        render_section_label('Course Not Found', 'ไม่พบคอร์สที่เลือก', 'กลับไปที่หน้าคอร์สเรียนเพื่อเลือกคอร์สใหม่');
        ?><a class="button ghost" href="?page=academy"><?= icon('paid') ?>กลับไปหน้าคอร์สเรียน</a><?php
        return;
    }

    if (($user['role'] ?? 'guest') === 'guest' || $enrollment === null) {
        render_section_label('Enrollment Required', 'ต้องลงทะเบียนก่อนเข้าเรียน', 'คอร์สนี้ต้องมีการลงทะเบียนก่อนจึงจะเข้าสู่บทเรียนได้');
        ?><a class="button" href="?page=academy"><?= icon('paid') ?>ไปลงทะเบียนคอร์ส</a><?php
        return;
    }

    if (($enrollment['status'] ?? '') !== 'active') {
        render_section_label('Payment Pending', 'รอชำระเงินก่อนเปิดบทเรียน', 'ระบบบันทึกการลงทะเบียนแล้ว แต่คอร์สเสียเงินต้องยืนยันการชำระเงินก่อนเข้าเรียน');
        ?><section class="feature-grid">
            <?php render_feature_card('c4', 'paid', $course['name'], 'สถานะ: รอชำระเงิน', ['PromptPay/Payment Gateway', 'รอตรวจสอบ', e($course['price'] ?? '')]); ?>
        </section><?php
        return;
    }

    $progress = kru_user_course_progress((string)$user['email'], $courseCode);
    $percent = (int)$progress['percent'];
    $lessons = $progress['lessons'];

    render_section_label('Now Learning', $course['name'], 'ความคืบหน้านี้คำนวณจากเอกสารประกอบการสอน สไลด์สอน และ VDO การสอนที่ผู้เรียนทำเครื่องหมายว่าเรียนแล้ว');
    ?><section class="stats-grid">
        <?php render_stat_card('c1', 'course', 'สถานะ', 'Active', 'เข้าเรียนได้ทันที'); ?>
        <?php render_stat_card('c1', 'media', 'สื่อการเรียน', (int)$progress['total_lessons'], 'เอกสาร/สไลด์/VDO'); ?>
        <?php render_stat_card('c2', 'score', 'เรียนแล้ว', (int)$progress['completed_lessons'], 'รายการที่ทำเครื่องหมายแล้ว'); ?>
        <?php render_stat_card('c3', 'portfolio', 'Progress', $percent . '%', 'ความคืบหน้าจริงของผู้เรียน'); ?>
    </section>
    <section class="card c1 learning-summary">
        <div>
            <strong><?= e($percent) ?>%</strong>
            <span>ความคืบหน้าของ <?= e((string)$user['name']) ?></span>
        </div>
        <?php render_progress_bar($percent); ?>
    </section>
    <?php render_section_label('Learning Materials', 'เอกสาร สไลด์ และ VDO การสอน', 'ถ้ายังไม่เคยเรียน ระบบจะแสดง 0% เมื่อเรียนจบแต่ละส่วนให้กดบันทึกเพื่อซิงค์ความคืบหน้า'); ?>
    <section class="stack">
        <?php if (count($lessons) === 0): ?>
            <article class="chapter-row c1">
                <div>
                    <?php render_type_badge('c1', 'No materials'); ?>
                    <h3>ยังไม่มีสื่อการเรียนในคอร์สนี้</h3>
                    <p>เมื่อเพิ่มเอกสารประกอบการสอน สไลด์ หรือ VDO แล้วระบบจะนำมาคำนวณความคืบหน้า</p>
                </div>
            </article>
        <?php endif; ?>
        <?php foreach ($lessons as $lesson): ?>
            <article class="chapter-row c1">
                <div>
                    <?php render_type_badge('c1', $lesson['source_label']); ?>
                    <h3><?= e($lesson['title']) ?></h3>
                    <p><?= e($lesson['source_title']) ?> · <?= e((int)$lesson['duration_minutes']) ?> นาที · สถานะ <?= e($lesson['status'] === 'completed' ? 'เรียนแล้ว' : 'ยังไม่เรียน') ?></p>
                    <?php if (($lesson['completed_at'] ?? '') !== ''): ?><p>บันทึกล่าสุด <?= e($lesson['completed_at']) ?></p><?php endif; ?>
                </div>
                <div class="lesson-actions">
                    <div class="row-progress"><?php render_progress_bar((int)$lesson['progress']); ?></div>
                    <?php if (($lesson['status'] ?? '') === 'completed'): ?>
                        <?php render_type_badge('c4', 'Completed'); ?>
                    <?php else: ?>
                        <form method="post">
                            <input type="hidden" name="action" value="mark_lesson_complete">
                            <input type="hidden" name="course_code" value="<?= e($courseCode) ?>">
                            <input type="hidden" name="lesson_code" value="<?= e($lesson['lesson_code']) ?>">
                            <button class="button" type="submit"><?= icon('score') ?>เรียนจบบทนี้</button>
                        </form>
                    <?php endif; ?>
                </div>
            </article>
        <?php endforeach; ?>
    </section><?php
}

function page_booking(array $data): void
{
    render_section_label('Booking', 'ตารางนัดเรียนตัวต่อตัว', 'เลือกเวลา ระบุหัวข้อ และติดตามสถานะนัดเรียน');
    ?><section class="stack"><?php foreach ($data['bookings'] as $booking): ?>
        <article class="chapter-row c4">
            <div>
                <?php render_type_badge('c4', $booking['status']); ?>
                <h3><?= e($booking['slot']) ?></h3>
                <p><?= e($booking['topic']) ?></p>
            </div>
            <a class="button ghost" href="?page=login"><?= icon('booking') ?>จัดการนัด</a>
        </article>
    <?php endforeach; ?></section><?php
}

function page_login(array $data): void
{
    $currentUser = $data['current_user'];
    if (($currentUser['role'] ?? 'guest') !== 'guest') {
        render_section_label('Already Signed In', 'คุณเข้าสู่ระบบอยู่แล้ว', 'เลือกไปหน้าที่ตรงกับสิทธิ์ของคุณ หรือออกจากระบบเพื่อเปลี่ยนบัญชี');
        ?><section class="course-access-grid">
            <article class="card <?= e((string)($currentUser['color'] ?? 'c1')) ?> course-access-card">
                <div class="card-icon"><?= icon('user') ?></div>
                <div>
                    <h3><?= e((string)($currentUser['name'] ?? 'User')) ?></h3>
                    <p><?= e((string)($currentUser['email'] ?? '')) ?> · <?= e(role_label($data, (string)($currentUser['role'] ?? 'guest'))) ?></p>
                    <div class="course-actions">
                        <?php if (($currentUser['user_type'] ?? '') === 'school_student'): ?>
                            <a class="button" href="?page=courses"><?= icon('course') ?>ไปหน้ารายวิชา</a>
                        <?php elseif (kru_can('manage_courses', $currentUser)): ?>
                            <a class="button" href="?page=admin"><?= icon('score') ?>ไป Admin</a>
                        <?php else: ?>
                            <a class="button" href="?page=academy"><?= icon('paid') ?>ไปคอร์สเรียน</a>
                        <?php endif; ?>
                        <form method="post">
                            <input type="hidden" name="action" value="logout">
                            <button class="button ghost" type="submit"><?= icon('lock') ?>ออกจากระบบ</button>
                        </form>
                    </div>
                </div>
            </article>
        </section><?php
        return;
    }

    render_section_label('Authentication', 'เข้าสู่ระบบเพื่อเข้าเรียน', 'นักเรียนเข้าสู่ระบบแล้วไปหน้ารายวิชาตามเทอมทันที ส่วนครูและผู้ดูแลไปหน้า Admin Dashboard');
    ?><section class="split">
        <article class="card c1">
            <h3>เข้าสู่ระบบ</h3>
            <form method="post" class="form-grid">
                <input type="hidden" name="action" value="login">
                <label class="wide">อีเมล<input name="email" type="email" placeholder="student@krucomcraft.local"></label>
                <label class="wide">รหัสผ่าน<input name="password" type="password" placeholder="กรอกรหัสผ่าน"></label>
                <button class="button" type="submit"><?= icon('lock') ?>เข้าสู่ระบบ</button>
                <a class="button ghost" href="?page=register"><?= icon('user') ?>สมัครสมาชิก</a>
            </form>
        </article>
        <article class="card c4">
            <h3>ลำดับหลังเข้าสู่ระบบ</h3>
            <div class="admin-list">
                <span><strong>Student</strong> ไปหน้า รายวิชา เพื่อดูเทอม สื่อ ใบงาน และความคืบหน้าของตัวเอง</span>
                <span><strong>Teacher/Admin</strong> ไปหน้า Admin Dashboard เพื่อจัดการรายวิชา นักเรียน สื่อ คะแนน และ QR</span>
                <span><strong>Public learner</strong> ไปหน้าคอร์สเรียนสาธารณะ ลงทะเบียนฟรีหรือชำระเงินตามประเภทคอร์ส</span>
            </div>
        </article>
    </section><?php
}

function page_register(array $data): void
{
    render_section_label('Registration', 'สมัครสมาชิกเพื่อเข้าเรียน', 'เลือกประเภทผู้สมัครให้ถูกต้อง: นักเรียนในโรงเรียน หรือบุคคลทั่วไป');
    ?><section class="split">
        <article class="card c1">
            <h3>ข้อมูลผู้สมัคร</h3>
            <form method="post" class="form-grid">
                <input type="hidden" name="action" value="register">
                <label class="wide">ประเภทผู้สมัคร
                    <select name="user_type">
                        <option value="school_student">นักเรียนในโรงเรียน</option>
                        <option value="public">บุคคลทั่วไป</option>
                    </select>
                </label>
                <label class="wide">ชื่อ-นามสกุล<input name="name" type="text" placeholder="เช่น สมชาย ใจดี"></label>
                <label class="wide">อีเมล<input name="email" type="email" placeholder="name@example.com"></label>
                <label class="wide">รหัสผ่าน<input name="password" type="password" placeholder="ตั้งรหัสผ่าน"></label>
                <label>รหัสนักเรียน<input name="student_id" type="text" placeholder="เฉพาะนักเรียน"></label>
                <label>ห้องเรียน<input name="classroom" type="text" placeholder="เช่น ม.1/2"></label>
                <button class="button" type="submit"><?= icon('user') ?>สมัครสมาชิก</button>
            </form>
        </article>
        <article class="card c4">
            <h3>เริ่มใช้งานจริง</h3>
            <div class="admin-list">
                <span><strong>School student</strong> เข้าถึงคอร์สในโรงเรียนตามห้องเรียน/รายวิชา</span>
                <span><strong>Public learner</strong> ลงทะเบียนคอร์ส public paid และรอชำระเงิน</span>
                <span><strong>Persistent users</strong> บันทึกบัญชีลง storage/app/data/users.json</span>
                <span><strong>Enrollments</strong> บันทึกการลงทะเบียนลง storage/app/data/enrollments.json</span>
            </div>
        </article>
    </section><?php
}

function page_profile(array $data): void
{
    $user = $data['current_user'];
    $role = (string)($user['role'] ?? 'guest');
    $isSchoolStudent = (($user['user_type'] ?? '') === 'school_student');

    render_section_label('Profile', 'แก้ไขโปรไฟล์ของฉัน', 'แก้ไขข้อมูลติดต่อและข้อมูลส่วนตัวได้เอง ส่วน role และสิทธิ์ถูกควบคุมโดยระบบ ไม่สามารถแก้เองได้');
    ?><section class="split">
        <article class="card <?= e((string)($user['color'] ?? 'c1')) ?>">
            <h3>ข้อมูลบัญชี</h3>
            <div class="profile-avatar-block">
                <img class="profile-avatar" src="<?= e(avatar_src($user)) ?>" width="84" height="84" alt="Profile image">
                <div>
                    <strong><?= e((string)($user['name'] ?? '')) ?></strong>
                    <span><?= e((string)($user['email'] ?? '')) ?></span>
                </div>
            </div>
            <form method="post" class="form-grid" enctype="multipart/form-data">
                <input type="hidden" name="action" value="update_profile">
                <label class="wide">รูปโปรไฟล์<input name="avatar" type="file" accept="image/png,image/jpeg,image/webp,image/gif"></label>
                <label class="wide">ชื่อ-นามสกุล<input name="name" type="text" value="<?= e((string)($user['name'] ?? '')) ?>"></label>
                <label class="wide">อีเมล<input name="email" type="email" value="<?= e((string)($user['email'] ?? '')) ?>"></label>
                <label>เบอร์โทร<input name="phone" type="text" value="<?= e((string)($user['phone'] ?? '')) ?>" placeholder="เช่น 08x-xxx-xxxx"></label>
                <label>Line ID<input name="line_id" type="text" value="<?= e((string)($user['line_id'] ?? '')) ?>" placeholder="Line ID"></label>
                <label class="wide">โรงเรียน/หน่วยงาน<input name="school" type="text" value="<?= e((string)($user['school'] ?? '')) ?>" placeholder="ชื่อโรงเรียนหรือหน่วยงาน"></label>
                <?php if ($isSchoolStudent): ?>
                    <label>ห้องเรียน<input name="classroom" type="text" value="<?= e((string)($user['classroom'] ?? '')) ?>" placeholder="เช่น ม.1/2"></label>
                    <label>รหัสนักเรียน<input name="student_id" type="text" value="<?= e((string)($user['student_id'] ?? '')) ?>" placeholder="รหัสนักเรียน"></label>
                <?php endif; ?>
                <label class="wide">แนะนำตัว/หมายเหตุ<input name="bio" type="text" value="<?= e((string)($user['bio'] ?? '')) ?>" placeholder="ข้อมูลเพิ่มเติมที่ต้องการให้ระบบบันทึก"></label>
                <label class="wide">เปลี่ยนรหัสผ่าน<input name="password" type="password" placeholder="เว้นว่างถ้าไม่ต้องการเปลี่ยน"></label>
                <button class="button" type="submit"><?= icon('user') ?>บันทึกโปรไฟล์</button>
            </form>
        </article>
        <article class="card c2">
            <h3>สิทธิ์ปัจจุบัน</h3>
            <div class="admin-list">
                <span><strong>Role</strong><?= e(role_label($data, $role)) ?></span>
                <span><strong>Account type</strong><?= e((string)($user['user_type'] ?? 'system')) ?></span>
                <span><strong>Email</strong><?= e((string)($user['email'] ?? '')) ?></span>
                <span><strong>แก้ไขไม่ได้เอง</strong> role, permissions, color และสถานะผู้ดูแล</span>
            </div>
            <div class="chip-row profile-permissions">
                <?php foreach (($data['roles'][$role]['permissions'] ?? []) as $permission): ?><span><?= e($permission) ?></span><?php endforeach; ?>
            </div>
        </article>
    </section><?php
}

function page_admin(array $data): void
{
    render_section_label('Admin Console', 'จัดการระบบหลังบ้าน', 'รวมงานจัดการรายวิชา ห้องเรียน นักเรียน QR สื่อ Blog Portfolio คอร์ส และ Booking');
    ?><section class="stats-grid">
        <?php render_stat_card('c1', 'course', 'นักเรียน', array_sum(array_column($data['courses'], 'students')), 'ผูกกับห้องเรียน'); ?>
        <?php render_stat_card('c2', 'score', 'Audit log', count($data['audit_logs']), 'รายการล่าสุด'); ?>
        <?php render_stat_card('c3', 'upload', 'สื่อและบทความ', count($data['media']) + count($data['posts']), 'พร้อมเผยแพร่'); ?>
        <?php render_stat_card('c4', 'paid', 'สินค้า/บริการ', count($data['academy']) + count($data['bookings']), 'คอร์สและนัดเรียน'); ?>
    </section>
    <section class="split">
        <article class="card c1">
            <h3>เพิ่มรายวิชา</h3>
            <form method="post" class="form-grid">
                <input type="hidden" name="action" value="create_course">
                <label>รหัสวิชา<input name="code" placeholder="COM-M4"></label>
                <label>เทอม<input name="term" placeholder="2/2568"></label>
                <label class="wide">ชื่อรายวิชา<input name="name" placeholder="Creative Coding"></label>
                <label>ระดับชั้น<input name="level" placeholder="ม.4"></label>
                <label>ห้องเรียน<input name="classroom" placeholder="ม.4/1"></label>
                <label>กลุ่มสาระ<input name="subject_group" value="คอมพิวเตอร์"></label>
                <label>ครูผู้สอน<input name="teacher" placeholder="ครูสมศักดิ์"></label>
                <label>จำนวนคาบ/สัปดาห์<input name="weekly_hours" type="number" min="0" value="2"></label>
                <label>หน่วยกิต<input name="credit" placeholder="1.0"></label>
                <label>จำนวนนักเรียน<input name="students" type="number" min="0" value="0"></label>
                <label>งานค้างเริ่มต้น<input name="pending" type="number" min="0" value="0"></label>
                <label>ความก้าวหน้าเริ่มต้น<input name="progress" type="number" min="0" max="100" value="0"></label>
                <label>สถานะ
                    <select name="status">
                        <option>เปิดสอน</option>
                        <option>ร่าง</option>
                        <option>ปิดคอร์ส</option>
                    </select>
                </label>
                <label>การมองเห็น
                    <select name="visibility">
                        <option>นักเรียนในห้องเรียน</option>
                        <option>ครูและผู้ดูแล</option>
                        <option>สาธารณะ</option>
                    </select>
                </label>
                <label class="wide">คำอธิบายรายวิชา<input name="description" placeholder="สรุปเนื้อหาหลักของรายวิชาและสิ่งที่นักเรียนจะได้เรียน"></label>
                <label class="wide">เป้าหมายการเรียนรู้<input name="objectives" placeholder="เช่น เขียนโปรแกรมพื้นฐาน ออกแบบอัลกอริทึม สร้างผลงาน Portfolio"></label>
                <label class="wide">การวัดผล<input name="assessment" placeholder="เช่น ใบงาน 40% โครงงาน 40% พฤติกรรม 20%"></label>
                <label class="wide">นโยบายสื่อการสอน<input name="media_policy" placeholder="เช่น เปิดเอกสารหลังเข้าเรียน / เฉพาะนักเรียนในรายวิชา"></label>
                <label class="checkline wide"><input name="qr_enabled" type="checkbox" checked> เปิดใช้งาน QR ตรวจงานสำหรับรายวิชานี้</label>
                <button class="button" type="submit"><?= icon('course') ?>บันทึกรายวิชา</button>
            </form>
        </article>
        <article class="card c2">
            <h3>Workflow ที่พร้อมต่อยอด Laravel</h3>
            <div class="admin-list">
                <span>CourseController / ClassroomController / StudentController</span>
                <span>QrTokenService สำหรับ student QR และ assignment QR</span>
                <span>GradebookService บันทึก score + status + note + timestamp</span>
                <span>AuditLog model สำหรับทุกการแก้ไขคะแนน</span>
                <span>Media, Blog, Portfolio, Academy, Booking modules</span>
            </div>
        </article>
    </section>
    <?php render_role_matrix($data); ?>
    <?php
}
