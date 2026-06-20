<?php
declare(strict_types=1);

function kru_storage_path(string $name): string
{
    $dir = dirname(__DIR__, 2) . '/storage/app/data';
    if (!is_dir($dir)) {
        mkdir($dir, 0775, true);
    }
    return $dir . '/' . $name . '.json';
}

function kru_seed(): array
{
    return [
        'users' => [
            ['email' => 'admin@krucomcraft.local', 'password' => 'password', 'role' => 'admin', 'name' => 'System Admin', 'color' => 'c4'],
            ['email' => 'teacher@krucomcraft.local', 'password' => 'password', 'role' => 'teacher', 'name' => 'Teacher KruComCraft', 'color' => 'c2'],
            ['email' => 'student@krucomcraft.local', 'password' => 'password', 'role' => 'student', 'user_type' => 'school_student', 'name' => 'Demo Student', 'classroom' => 'ม.1/2', 'student_id' => 'STU-001', 'color' => 'c1'],
            ['email' => 'parent@krucomcraft.local', 'password' => 'password', 'role' => 'parent', 'user_type' => 'public', 'name' => 'Demo Parent', 'color' => 'c3'],
        ],
        'courses' => [
            ['code' => 'COM-M1', 'name' => 'วิทยาการคำนวณ ม.1', 'classroom' => 'ม.1/2', 'term' => '2/2568', 'students' => 36, 'progress' => 68, 'pending' => 14, 'color' => 'c1'],
            ['code' => 'COM-M2', 'name' => 'Coding & Robotics ม.2', 'classroom' => 'ม.2/1', 'term' => '2/2568', 'students' => 34, 'progress' => 74, 'pending' => 9, 'color' => 'c1'],
            ['code' => 'AI-M3', 'name' => 'AI Literacy ม.3', 'classroom' => 'ม.3/3', 'term' => '2/2568', 'students' => 32, 'progress' => 58, 'pending' => 18, 'color' => 'c1'],
            ['code' => 'WEB-M2', 'name' => 'Web Design เบื้องต้น', 'classroom' => 'ม.2/2', 'term' => '1/2568', 'students' => 31, 'progress' => 100, 'pending' => 0, 'color' => 'c1'],
            ['code' => 'ROB-M3', 'name' => 'Robotics Project', 'classroom' => 'ม.3/1', 'term' => '1/2568', 'students' => 29, 'progress' => 100, 'pending' => 0, 'color' => 'c1'],
        ],
        'chapters' => [
            ['title' => 'อัลกอริทึมและ Flowchart', 'type' => 'ใบงาน', 'course' => 'COM-M1', 'progress' => 82],
            ['title' => 'Micro:bit Sensor Challenge', 'type' => 'Lab', 'course' => 'COM-M2', 'progress' => 64],
            ['title' => 'Prompt Design สำหรับนักเรียน', 'type' => 'Project', 'course' => 'AI-M3', 'progress' => 47],
        ],
        'students' => [
            ['id' => 'STU-001', 'name' => 'ณัฐวุฒิ ศรีสุข', 'classroom' => 'ม.1/2', 'qr' => 'KCC-STU-001'],
            ['id' => 'STU-014', 'name' => 'พิมพ์ชนก แก้วใส', 'classroom' => 'ม.2/1', 'qr' => 'KCC-STU-014'],
            ['id' => 'STU-027', 'name' => 'ธนกฤต วัฒนา', 'classroom' => 'ม.3/3', 'qr' => 'KCC-STU-027'],
        ],
        'assignments' => [
            ['id' => 'ASN-101', 'title' => 'Flowchart สมุดหน้า 12', 'course' => 'COM-M1', 'max_score' => 10, 'qr' => 'KCC-ASN-101'],
            ['id' => 'ASN-205', 'title' => 'Robot Line Tracking', 'course' => 'COM-M2', 'max_score' => 20, 'qr' => 'KCC-ASN-205'],
            ['id' => 'ASN-309', 'title' => 'AI Reflection Journal', 'course' => 'AI-M3', 'max_score' => 15, 'qr' => 'KCC-ASN-309'],
        ],
        'media' => [
            ['title' => 'สไลด์ Computational Thinking', 'type' => 'PDF', 'course' => 'COM-M1', 'access' => 'นักเรียนในรายวิชา'],
            ['title' => 'วิดีโอ Micro:bit Starter', 'type' => 'Video', 'course' => 'COM-M2', 'access' => 'สาธารณะ'],
            ['title' => 'ชุดภาพ Prompt Engineering', 'type' => 'Image Set', 'course' => 'AI-M3', 'access' => 'ครูและนักเรียน'],
        ],
        'course_materials' => [
            [
                'course_code' => 'SCH-CODING-M1',
                'lesson_code' => 'SCH-CODING-M1-L01',
                'title' => 'บทที่ 1: อัลกอริทึมและ Flowchart',
                'material_type' => 'slides',
                'source_label' => 'สไลด์สอน',
                'source_title' => 'สไลด์ Computational Thinking',
                'duration_minutes' => 20,
            ],
            [
                'course_code' => 'SCH-CODING-M1',
                'lesson_code' => 'SCH-CODING-M1-L02',
                'title' => 'บทที่ 2: ใบงาน Flowchart สมุดหน้า 12',
                'material_type' => 'document',
                'source_label' => 'เอกสารประกอบการสอน',
                'source_title' => 'Flowchart สมุดหน้า 12',
                'duration_minutes' => 35,
            ],
            [
                'course_code' => 'SCH-CODING-M1',
                'lesson_code' => 'SCH-CODING-M1-L03',
                'title' => 'บทที่ 3: วิดีโอทบทวนการเขียนลำดับขั้นตอน',
                'material_type' => 'video',
                'source_label' => 'VDO การสอน',
                'source_title' => 'Coding Step-by-step Review',
                'duration_minutes' => 15,
            ],
            [
                'course_code' => 'PUB-FREE01',
                'lesson_code' => 'PUB-FREE01-L01',
                'title' => 'บทที่ 1: โครงสร้าง Portfolio',
                'material_type' => 'slides',
                'source_label' => 'สไลด์สอน',
                'source_title' => 'Digital Portfolio Starter',
                'duration_minutes' => 18,
            ],
            [
                'course_code' => 'PUB-AI01',
                'lesson_code' => 'PUB-AI01-L01',
                'title' => 'บทที่ 1: รู้จัก AI Tools',
                'material_type' => 'video',
                'source_label' => 'VDO การสอน',
                'source_title' => 'AI Tools Overview',
                'duration_minutes' => 25,
            ],
        ],
        'posts' => [
            ['title' => 'สอน Coding ให้เริ่มจากปัญหาใกล้ตัว', 'tag' => 'Coding', 'date' => '17 มิ.ย. 2569'],
            ['title' => 'AI ในห้องเรียน: ใช้อย่างไรให้คิดเป็น', 'tag' => 'AI', 'date' => '12 มิ.ย. 2569'],
            ['title' => 'Rubric งานโครงงานคอมพิวเตอร์', 'tag' => 'Assessment', 'date' => '8 มิ.ย. 2569'],
        ],
        'projects' => [
            ['title' => 'ห้องเรียนหุ่นยนต์เดินตามเส้น', 'result' => 'นักเรียนสร้างต้นแบบ 12 ทีม', 'year' => '2569'],
            ['title' => 'AI Poster for School Safety', 'result' => 'ผลงานเผยแพร่ระดับโรงเรียน', 'year' => '2569'],
            ['title' => 'Portfolio Coding Camp', 'result' => 'นักเรียนมีเว็บผลงานส่วนตัว', 'year' => '2568'],
        ],
        'academy' => [
            [
                'code' => 'SCH-CODING-M1',
                'name' => 'Coding ในห้องเรียน ม.1',
                'type' => 'school',
                'audience' => 'เฉพาะนักเรียนในโรงเรียนที่ครูสอน',
                'enrollment' => 'ผูกจากรายวิชา/ห้องเรียน',
                'price' => 'ไม่มีค่าใช้จ่าย',
                'progress' => 68,
                'color' => 'c1',
                'access_note' => 'ต้องเป็น student ที่อยู่ใน classroom ของรายวิชา',
            ],
            [
                'code' => 'SCH-AI-M3',
                'name' => 'AI Literacy สำหรับนักเรียน ม.3',
                'type' => 'school',
                'audience' => 'เฉพาะนักเรียนในโรงเรียนที่ครูสอน',
                'enrollment' => 'ผูกจากรายวิชา/ห้องเรียน',
                'price' => 'ไม่มีค่าใช้จ่าย',
                'progress' => 58,
                'color' => 'c1',
                'access_note' => 'เห็นเฉพาะนักเรียนในห้องที่ได้รับมอบหมาย',
            ],
            [
                'code' => 'PUB-AI01',
                'name' => 'AI Tools สำหรับผู้เริ่มต้น',
                'type' => 'public_paid',
                'audience' => 'บุคคลทั่วไปเรียนได้',
                'enrollment' => 'ลงทะเบียนและชำระเงิน',
                'price' => '1,290 บาท',
                'progress' => 40,
                'color' => 'c4',
                'access_note' => 'เปิดบทเรียนหลังยืนยันการชำระเงิน',
            ],
            [
                'code' => 'PUB-FREE01',
                'name' => 'พื้นฐาน Digital Portfolio ฟรี',
                'type' => 'public_free',
                'audience' => 'นักเรียนในโรงเรียนและบุคคลทั่วไปเรียนได้',
                'enrollment' => 'ลงทะเบียนแล้วเข้าเรียนได้ทันที',
                'price' => 'ฟรี',
                'progress' => 35,
                'color' => 'c4',
                'access_note' => 'คอร์สเปิดฟรีสำหรับทุกคนที่สมัครสมาชิก',
            ],
            [
                'code' => 'PUB-WEB01',
                'name' => 'สร้าง Portfolio Website',
                'type' => 'public_paid',
                'audience' => 'บุคคลทั่วไปเรียนได้',
                'enrollment' => 'ลงทะเบียนและชำระเงิน',
                'price' => '1,990 บาท',
                'progress' => 66,
                'color' => 'c4',
                'access_note' => 'รองรับ PromptPay/Payment Gateway',
            ],
        ],
        'bookings' => [
            ['slot' => 'เสาร์ 09:00', 'topic' => 'เริ่มต้น Coding', 'status' => 'ว่าง'],
            ['slot' => 'เสาร์ 13:00', 'topic' => 'Portfolio Review', 'status' => 'จองแล้ว'],
            ['slot' => 'อาทิตย์ 10:00', 'topic' => 'AI Project Coaching', 'status' => 'ว่าง'],
        ],
    ];
}

function kru_roles(): array
{
    return [
        'guest' => [
            'label' => 'Guest',
            'permissions' => ['view_public', 'view_public_courses'],
        ],
        'student' => [
            'label' => 'Student',
            'permissions' => ['view_public', 'view_courses', 'view_media', 'view_own_scores', 'view_school_courses', 'view_public_courses', 'register_public_course', 'register_school_course'],
        ],
        'parent' => [
            'label' => 'Parent',
            'permissions' => ['view_public', 'view_courses', 'view_media', 'view_child_scores', 'view_public_courses', 'register_public_course'],
        ],
        'teacher' => [
            'label' => 'Teacher',
            'permissions' => [
                'view_public',
                'view_courses',
                'manage_courses',
                'manage_classrooms',
                'manage_students',
                'create_qr',
                'grade_work',
                'view_audit',
                'manage_media',
                'manage_blog',
                'manage_portfolio',
                'manage_academy',
                'manage_school_courses',
                'manage_public_paid_courses',
                'manage_booking',
            ],
        ],
        'admin' => [
            'label' => 'Admin',
            'permissions' => [
                'view_public',
                'view_courses',
                'manage_courses',
                'manage_classrooms',
                'manage_students',
                'create_qr',
                'grade_work',
                'view_audit',
                'manage_media',
                'manage_blog',
                'manage_portfolio',
                'manage_academy',
                'manage_school_courses',
                'manage_public_paid_courses',
                'manage_booking',
                'manage_users',
                'manage_roles',
                'settings',
            ],
        ],
    ];
}

function kru_user_by_email(string $email): ?array
{
    foreach (kru_users() as $user) {
        if (strtolower($user['email']) === strtolower($email)) {
            return $user;
        }
    }
    return null;
}

function kru_users(): array
{
    return kru_json_read('users', kru_seed()['users']);
}

function kru_register_user(array $input): string
{
    $name = trim((string)($input['name'] ?? ''));
    $email = strtolower(trim((string)($input['email'] ?? '')));
    $password = (string)($input['password'] ?? '');
    $userType = (string)($input['user_type'] ?? 'public');
    $classroom = trim((string)($input['classroom'] ?? ''));
    $studentId = trim((string)($input['student_id'] ?? ''));

    if ($name === '' || $email === '' || $password === '') {
        return 'กรุณากรอกชื่อ อีเมล และรหัสผ่านให้ครบ';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return 'รูปแบบอีเมลไม่ถูกต้อง';
    }
    if (!in_array($userType, ['school_student', 'public'], true)) {
        return 'ประเภทผู้สมัครไม่ถูกต้อง';
    }
    if ($userType === 'school_student' && ($classroom === '' || $studentId === '')) {
        return 'นักเรียนในโรงเรียนต้องกรอกห้องเรียนและรหัสนักเรียน';
    }
    if (kru_user_by_email($email) !== null) {
        return 'อีเมลนี้มีผู้ใช้งานแล้ว';
    }

    $users = kru_users();
    $users[] = [
        'email' => $email,
        'password_hash' => password_hash($password, PASSWORD_DEFAULT),
        'role' => 'student',
        'user_type' => $userType,
        'name' => $name,
        'classroom' => $classroom,
        'student_id' => $studentId,
        'color' => $userType === 'school_student' ? 'c1' : 'c4',
        'created_at' => date('Y-m-d H:i'),
    ];
    kru_json_write('users', $users);
    $_SESSION['user_email'] = $email;
    return 'สมัครสมาชิกเรียบร้อย';
}

function kru_update_profile(array $input): string
{
    $current = kru_current_user();
    if (($current['role'] ?? 'guest') === 'guest' || ($current['email'] ?? '') === '') {
        return 'กรุณาเข้าสู่ระบบก่อนแก้ไขโปรไฟล์';
    }

    $name = trim((string)($input['name'] ?? ''));
    $email = strtolower(trim((string)($input['email'] ?? '')));
    $phone = trim((string)($input['phone'] ?? ''));
    $lineId = trim((string)($input['line_id'] ?? ''));
    $school = trim((string)($input['school'] ?? ''));
    $classroom = trim((string)($input['classroom'] ?? ''));
    $studentId = trim((string)($input['student_id'] ?? ''));
    $bio = trim((string)($input['bio'] ?? ''));
    $password = (string)($input['password'] ?? '');
    $avatar = is_array($input['avatar'] ?? null) ? $input['avatar'] : null;

    if ($name === '' || $email === '') {
        return 'กรุณากรอกชื่อและอีเมลให้ครบ';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return 'รูปแบบอีเมลไม่ถูกต้อง';
    }

    $users = kru_users();
    $found = false;
    foreach ($users as $user) {
        if (strtolower((string)($user['email'] ?? '')) === $email && strtolower((string)($user['email'] ?? '')) !== strtolower((string)$current['email'])) {
            return 'อีเมลนี้มีผู้ใช้งานแล้ว';
        }
    }

    foreach ($users as &$user) {
        if (strtolower((string)($user['email'] ?? '')) !== strtolower((string)$current['email'])) {
            continue;
        }

        $found = true;
        $user['email'] = $email;
        $user['name'] = $name;
        $user['phone'] = $phone;
        $user['line_id'] = $lineId;
        $user['school'] = $school;
        $user['bio'] = $bio;

        if (($user['user_type'] ?? '') === 'school_student') {
            $user['classroom'] = $classroom;
            $user['student_id'] = $studentId;
        }

        if ($password !== '') {
            if (strlen($password) < 6) {
                return 'รหัสผ่านใหม่ต้องมีอย่างน้อย 6 ตัวอักษร';
            }
            unset($user['password']);
            $user['password_hash'] = password_hash($password, PASSWORD_DEFAULT);
        }

        if ($avatar !== null && (int)($avatar['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_NO_FILE) {
            $uploadedAvatar = kru_store_avatar($avatar, (string)$user['email']);
            if (!str_starts_with($uploadedAvatar, 'assets/')) {
                return $uploadedAvatar;
            }
            $user['avatar'] = $uploadedAvatar;
        }

        $user['updated_at'] = date('Y-m-d H:i');
        break;
    }
    unset($user);

    if (!$found) {
        return 'ไม่พบผู้ใช้ที่ต้องการแก้ไข';
    }

    kru_json_write('users', $users);
    $_SESSION['user_email'] = $email;
    return 'อัปเดตโปรไฟล์เรียบร้อย';
}

function kru_store_avatar(array $file, string $email): string
{
    $error = (int)($file['error'] ?? UPLOAD_ERR_NO_FILE);
    if ($error !== UPLOAD_ERR_OK) {
        return 'อัปโหลดรูปโปรไฟล์ไม่สำเร็จ';
    }

    $tmp = (string)($file['tmp_name'] ?? '');
    $size = (int)($file['size'] ?? 0);
    if ($tmp === '' || $size <= 0) {
        return 'ไม่พบไฟล์รูปโปรไฟล์';
    }
    if ($size > 2 * 1024 * 1024) {
        return 'รูปโปรไฟล์ต้องมีขนาดไม่เกิน 2MB';
    }

    $extension = strtolower(pathinfo((string)($file['name'] ?? ''), PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
    if (!in_array($extension, $allowed, true)) {
        return 'รองรับเฉพาะรูปภาพ jpg, png, webp หรือ gif';
    }

    $imageInfo = @getimagesize($tmp);
    if ($imageInfo === false) {
        return 'ไฟล์ที่อัปโหลดไม่ใช่รูปภาพ';
    }

    $dir = dirname(__DIR__, 2) . '/public/assets/uploads/avatars';
    if (!is_dir($dir)) {
        mkdir($dir, 0775, true);
    }

    $safeName = preg_replace('/[^a-z0-9]+/i', '-', strtolower($email));
    $filename = trim((string)$safeName, '-') . '-' . date('YmdHis') . '.' . $extension;
    $target = $dir . '/' . $filename;

    if (!move_uploaded_file($tmp, $target)) {
        return 'ไม่สามารถบันทึกรูปโปรไฟล์ได้';
    }

    return 'assets/uploads/avatars/' . $filename;
}

function kru_enroll_course(array $input): string
{
    $user = kru_current_user();
    if (($user['role'] ?? 'guest') === 'guest') {
        return 'กรุณาเข้าสู่ระบบหรือสมัครสมาชิกก่อนลงทะเบียนคอร์ส';
    }

    $courseCode = trim((string)($input['course_code'] ?? ''));
    $course = null;
    foreach (kru_seed()['academy'] as $item) {
        if (($item['code'] ?? '') === $courseCode) {
            $course = $item;
            break;
        }
    }
    if ($course === null) {
        return 'ไม่พบคอร์สที่เลือก';
    }
    $courseType = (string)($course['type'] ?? '');
    $userType = (string)($user['user_type'] ?? 'public');
    if ($courseType === 'school' && $userType !== 'school_student') {
        return 'รายวิชานี้เปิดเฉพาะนักเรียนใน class/โรงเรียนที่ครูสอนเท่านั้น';
    }

    $enrollments = kru_json_read('enrollments', []);
    foreach ($enrollments as $enrollment) {
        if (($enrollment['email'] ?? '') === ($user['email'] ?? '') && ($enrollment['course_code'] ?? '') === $courseCode) {
            return 'คุณลงทะเบียนคอร์สนี้แล้ว';
        }
    }

    $status = $courseType === 'public_paid' ? 'pending_payment' : 'active';
    $enrollments[] = [
        'email' => $user['email'],
        'course_code' => $courseCode,
        'course_name' => $course['name'],
        'course_type' => $courseType,
        'price' => $course['price'],
        'status' => $status,
        'created_at' => date('Y-m-d H:i'),
    ];
    kru_json_write('enrollments', $enrollments);
    return $status === 'pending_payment' ? 'ลงทะเบียนคอร์สแล้ว กรุณาชำระเงินเพื่อเปิดบทเรียน' : 'ลงทะเบียนคอร์สเรียบร้อย';
}

function kru_login(array $input): ?array
{
    $email = trim((string)($input['email'] ?? ''));
    $password = (string)($input['password'] ?? '');
    $user = kru_user_by_email($email);
    $validPassword = false;
    if ($user !== null && isset($user['password_hash'])) {
        $validPassword = password_verify($password, (string)$user['password_hash']);
    }
    if ($user !== null && isset($user['password'])) {
        $validPassword = hash_equals((string)$user['password'], $password);
    }
    if ($user === null || !$validPassword) {
        return null;
    }
    $_SESSION['user_email'] = $user['email'];
    return $user;
}

function kru_logout(): void
{
    unset($_SESSION['user_email']);
}

function kru_current_user(): array
{
    $email = (string)($_SESSION['user_email'] ?? '');
    $user = $email !== '' ? kru_user_by_email($email) : null;
    return $user ?? ['email' => '', 'password' => '', 'role' => 'guest', 'name' => 'Guest', 'color' => 'c1'];
}

function kru_can(string $permission, ?array $user = null): bool
{
    $user ??= kru_current_user();
    $roles = kru_roles();
    $permissions = $roles[$user['role']]['permissions'] ?? [];
    return in_array($permission, $permissions, true);
}

function kru_json_read(string $name, array $fallback): array
{
    $path = kru_storage_path($name);
    if (!file_exists($path)) {
        file_put_contents($path, json_encode($fallback, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        return $fallback;
    }
    $decoded = json_decode((string)file_get_contents($path), true);
    return is_array($decoded) ? $decoded : $fallback;
}

function kru_json_write(string $name, array $payload): void
{
    file_put_contents(kru_storage_path($name), json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

function kru_data(): array
{
    $seed = kru_seed();
    $seed['roles'] = kru_roles();
    $seed['current_user'] = kru_current_user();
    $seed['users'] = kru_users();
    $seed['enrollments'] = kru_json_read('enrollments', []);
    $seed['learning_progress'] = kru_json_read('learning_progress', []);
    $seed['grades'] = kru_json_read('grades', [
        ['student' => 'STU-001', 'assignment' => 'ASN-101', 'score' => 9, 'status' => 'ผ่าน', 'note' => 'ส่งตรงเวลา', 'updated_at' => '2569-06-17 09:20'],
        ['student' => 'STU-014', 'assignment' => 'ASN-205', 'score' => 16, 'status' => 'รอตรวจซ้ำ', 'note' => 'ต้องปรับ sensor', 'updated_at' => '2569-06-17 10:05'],
    ]);
    $seed['audit_logs'] = kru_json_read('audit_logs', [
        ['time' => '2569-06-17 10:05', 'actor' => 'ครูศิวานนท์', 'event' => 'แก้คะแนน ASN-205 ของ STU-014 เป็น 16'],
    ]);
    $seed['custom_courses'] = kru_json_read('custom_courses', []);
    $seed['courses'] = array_merge($seed['courses'], $seed['custom_courses']);
    return $seed;
}

function kru_course_materials(string $courseCode): array
{
    return array_values(array_filter(kru_seed()['course_materials'], fn (array $item): bool => ($item['course_code'] ?? '') === $courseCode));
}

function kru_user_course_progress(string $email, string $courseCode): array
{
    $materials = kru_course_materials($courseCode);
    $progressRows = kru_json_read('learning_progress', []);
    $completed = [];

    foreach ($progressRows as $row) {
        if (($row['email'] ?? '') === $email && ($row['course_code'] ?? '') === $courseCode && ($row['status'] ?? '') === 'completed') {
            $completed[(string)$row['lesson_code']] = $row;
        }
    }

    $lessons = [];
    foreach ($materials as $material) {
        $lessonCode = (string)$material['lesson_code'];
        $isCompleted = isset($completed[$lessonCode]);
        $lessons[] = $material + [
            'status' => $isCompleted ? 'completed' : 'not_started',
            'progress' => $isCompleted ? 100 : 0,
            'completed_at' => $completed[$lessonCode]['completed_at'] ?? '',
        ];
    }

    $total = count($lessons);
    $done = count(array_filter($lessons, fn (array $lesson): bool => ($lesson['status'] ?? '') === 'completed'));

    return [
        'lessons' => $lessons,
        'total_lessons' => $total,
        'completed_lessons' => $done,
        'percent' => $total > 0 ? (int)floor(($done / $total) * 100) : 0,
    ];
}

function kru_mark_lesson_complete(array $input): string
{
    $user = kru_current_user();
    if (($user['role'] ?? 'guest') === 'guest') {
        return 'กรุณาเข้าสู่ระบบก่อนบันทึกความคืบหน้า';
    }

    $courseCode = strtoupper(trim((string)($input['course_code'] ?? '')));
    $lessonCode = strtoupper(trim((string)($input['lesson_code'] ?? '')));
    if ($courseCode === '' || $lessonCode === '') {
        return 'ไม่พบข้อมูลบทเรียนที่ต้องการบันทึก';
    }

    $validLesson = false;
    foreach (kru_course_materials($courseCode) as $material) {
        if (($material['lesson_code'] ?? '') === $lessonCode) {
            $validLesson = true;
            break;
        }
    }
    if (!$validLesson) {
        return 'บทเรียนนี้ไม่อยู่ในคอร์สที่เลือก';
    }

    $hasEnrollment = false;
    foreach (kru_json_read('enrollments', []) as $enrollment) {
        if (($enrollment['email'] ?? '') === ($user['email'] ?? '') && ($enrollment['course_code'] ?? '') === $courseCode && ($enrollment['status'] ?? '') === 'active') {
            $hasEnrollment = true;
            break;
        }
    }
    if (!$hasEnrollment) {
        return 'ต้องลงทะเบียนและมีสถานะ active ก่อนบันทึกความคืบหน้า';
    }

    $rows = kru_json_read('learning_progress', []);
    foreach ($rows as &$row) {
        if (($row['email'] ?? '') === ($user['email'] ?? '') && ($row['course_code'] ?? '') === $courseCode && ($row['lesson_code'] ?? '') === $lessonCode) {
            $row['status'] = 'completed';
            $row['completed_at'] = date('Y-m-d H:i');
            kru_json_write('learning_progress', $rows);
            return 'บันทึกความคืบหน้าบทเรียนแล้ว';
        }
    }
    unset($row);

    $rows[] = [
        'email' => $user['email'],
        'course_code' => $courseCode,
        'lesson_code' => $lessonCode,
        'status' => 'completed',
        'completed_at' => date('Y-m-d H:i'),
    ];
    kru_json_write('learning_progress', $rows);
    return 'บันทึกความคืบหน้าบทเรียนแล้ว';
}

function kru_save_grade(array $input): string
{
    $student = trim((string)($input['student'] ?? ''));
    $assignment = trim((string)($input['assignment'] ?? ''));
    $score = max(0, (int)($input['score'] ?? 0));
    $status = trim((string)($input['status'] ?? 'ตรวจแล้ว'));
    $note = trim((string)($input['note'] ?? ''));
    $now = date('Y-m-d H:i');

    if ($student === '' || $assignment === '') {
        return 'กรุณาเลือกนักเรียนและงานก่อนบันทึกคะแนน';
    }

    $grades = kru_json_read('grades', []);
    $oldScore = null;
    foreach ($grades as &$grade) {
        if (($grade['student'] ?? '') === $student && ($grade['assignment'] ?? '') === $assignment) {
            $oldScore = $grade['score'] ?? null;
            $grade = compact('student', 'assignment', 'score', 'status', 'note') + ['updated_at' => $now];
            break;
        }
    }
    unset($grade);

    if ($oldScore === null) {
        $grades[] = compact('student', 'assignment', 'score', 'status', 'note') + ['updated_at' => $now];
    }
    kru_json_write('grades', $grades);

    $logs = kru_json_read('audit_logs', []);
    $change = $oldScore === null ? "บันทึกคะแนน {$assignment} ของ {$student} เป็น {$score}" : "แก้คะแนน {$assignment} ของ {$student} จาก {$oldScore} เป็น {$score}";
    array_unshift($logs, ['time' => $now, 'actor' => 'ครูศิวานนท์', 'event' => $change]);
    kru_json_write('audit_logs', array_slice($logs, 0, 25));

    return 'บันทึกคะแนนและสร้าง audit log เรียบร้อย';
}

function kru_create_course(array $input): string
{
    $code = strtoupper(trim((string)($input['code'] ?? '')));
    $name = trim((string)($input['name'] ?? ''));
    $classroom = trim((string)($input['classroom'] ?? ''));
    $term = trim((string)($input['term'] ?? ''));
    $level = trim((string)($input['level'] ?? ''));
    $teacher = trim((string)($input['teacher'] ?? ''));
    $description = trim((string)($input['description'] ?? ''));

    if ($code === '' || $name === '' || $classroom === '' || $term === '' || $level === '' || $teacher === '' || $description === '') {
        return 'กรุณากรอกข้อมูลรายวิชาหลักให้ครบ: รหัสวิชา ชื่อรายวิชา เทอม ระดับชั้น ห้องเรียน ครูผู้สอน และคำอธิบายรายวิชา';
    }

    $courses = kru_json_read('custom_courses', []);
    foreach (array_merge(kru_seed()['courses'], $courses) as $course) {
        if (strtoupper((string)($course['code'] ?? '')) === $code && (string)($course['term'] ?? '') === $term && (string)($course['classroom'] ?? '') === $classroom) {
            return 'มีรายวิชานี้ในเทอมและห้องเรียนเดียวกันแล้ว';
        }
    }

    $students = max(0, (int)($input['students'] ?? 0));
    $weeklyHours = max(0, (int)($input['weekly_hours'] ?? 1));
    $pending = max(0, (int)($input['pending'] ?? 0));
    $progress = max(0, min(100, (int)($input['progress'] ?? 0)));
    $credit = trim((string)($input['credit'] ?? ''));
    $subjectGroup = trim((string)($input['subject_group'] ?? 'คอมพิวเตอร์'));
    $status = trim((string)($input['status'] ?? 'เปิดสอน'));
    $visibility = trim((string)($input['visibility'] ?? 'นักเรียนในห้องเรียน'));
    $objectives = trim((string)($input['objectives'] ?? ''));
    $assessment = trim((string)($input['assessment'] ?? ''));
    $mediaPolicy = trim((string)($input['media_policy'] ?? ''));
    $qrEnabled = isset($input['qr_enabled']) ? 'เปิดใช้งาน QR ตรวจงาน' : 'ยังไม่เปิด QR';

    $courses[] = [
        'code' => $code,
        'name' => $name,
        'classroom' => $classroom,
        'term' => $term,
        'level' => $level,
        'teacher' => $teacher,
        'description' => $description,
        'subject_group' => $subjectGroup,
        'weekly_hours' => $weeklyHours,
        'credit' => $credit,
        'students' => $students,
        'progress' => $progress,
        'pending' => $pending,
        'status' => $status,
        'visibility' => $visibility,
        'objectives' => $objectives,
        'assessment' => $assessment,
        'media_policy' => $mediaPolicy,
        'qr_enabled' => $qrEnabled,
        'color' => 'c1',
        'created_at' => date('Y-m-d H:i'),
    ];
    kru_json_write('custom_courses', $courses);
    return 'เพิ่มรายวิชาแบบละเอียดเรียบร้อย';
}
