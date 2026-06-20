# KruComCraft

เว็บต้นแบบสำหรับ Teacher Learning Platform ที่รวมรายวิชา ตรวจงาน QR คลังสื่อ Blog Portfolio คอร์สออนไลน์ และ Booking ไว้ในระบบเดียว โดยยึด Design System จาก `KruComCraft_SA_Design.md`

## Run

เปิดผ่าน XAMPP แบบเดิม:

```text
http://localhost/KruComCraft/
```

หรือชี้ document root ไปที่ `public/` ตามมาตรฐาน PHP:

```text
http://localhost/KruComCraft/public/
```

หรือรันด้วย PHP built-in server:

```bash
php -S 127.0.0.1:8090 -t public
```

แล้วเข้า:

```text
http://127.0.0.1:8090
```

## Pages

- `?page=dashboard` หน้าแรกแสดงคอร์สเรียน
- `?page=courses` รายวิชาสำหรับนักเรียน แยกตามเทอมการศึกษา
- `?page=qr-grading`
- `?page=media`
- `?page=blog`
- `?page=portfolio`
- `?page=academy`
- `?page=booking`
- `?page=login`
- `?page=admin`

## Demo Users & Roles

รหัสผ่านของ demo user ทุกตัวคือ `password`

- `admin@krucomcraft.local` -> `admin`
- `teacher@krucomcraft.local` -> `teacher`
- `student@krucomcraft.local` -> `student`
- `parent@krucomcraft.local` -> `parent`

Role ถูกผูกกับ session และตรวจ permission ก่อน action สำคัญ เช่น `grade_work` สำหรับบันทึกคะแนน และ `manage_courses` สำหรับเพิ่มรายวิชา

## Course Types

คอร์สเรียนแบ่งเป็น 3 แบบ:

- `school`: รายวิชาที่ครูสอนในโรงเรียน เฉพาะบัญชี `school_student` หรือนักเรียนใน class เท่านั้น
- `public_free`: คอร์สทั่วไปแบบไม่เสียเงิน ทั้งนักเรียนใน class และผู้ใช้ทั่วไปลงทะเบียนได้
- `public_paid`: คอร์สทั่วไปแบบเสียเงิน ทั้งนักเรียนใน class และผู้ใช้ทั่วไปลงทะเบียนได้ แต่ต้องชำระเงินก่อนเปิดบทเรียน

กติกาสิทธิ์หลัก:

- นักเรียนใน class ลงทะเบียนได้ทั้ง `school`, `public_free`, `public_paid`
- ผู้ใช้ทั่วไปลงทะเบียนได้เฉพาะ `public_free`, `public_paid`
- ผู้ใช้ทั่วไปลงทะเบียนรายวิชา `school` ไม่ได้ เพราะเป็นรายวิชาที่ครูสอนในโรงเรียนเท่านั้น

## Design System

- Kanit: heading, badge, button, course code
- Sarabun: body text
- Tokens: `--bg`, `--surface`, `--card`, `--border`, `--text`, `--muted`, `--accent1`, `--accent2`, `--accent3`, `--accent4`
- Module classes:
  - `c1`: รายวิชาและสื่อการสอน
  - `c2`: ตรวจงาน QR และคะแนน
  - `c3`: Blog และ Portfolio
  - `c4`: คอร์สเสียเงิน นัดเรียน และ Payment

## Architecture

โปรเจกต์ถูกปรับเป็นโครงแบบ MVC/Service/Repository แล้ว โดยยังรันกับ XAMPP เดิมได้:

```text
index.php
public/index.php
public/assets/
bootstrap/app.php
config/routes.php
config/page_meta.php
app/Http/Kernel.php
app/Http/Controllers/
app/Http/Requests/
app/Services/
app/Repositories/
app/Support/functions.php
resources/views/components.php
storage/app/data/*.json
storage/framework/sessions/
```

อ่านรายละเอียดได้ที่ `docs/ARCHITECTURE.md`

## Laravel Path

โครงปัจจุบันย้ายต่อเป็น Laravel ได้ตรง ๆ:

- `app/Http/Controllers/*` -> Laravel controllers
- `app/Http/Requests/*` -> Laravel FormRequest
- `app/Services/*` -> Laravel services
- `app/Repositories/*` -> Eloquent repositories หรือ model query layer
- `config/routes.php` -> `routes/web.php`
- `resources/views/components.php` -> Blade layouts/components/pages
- `app/Support/functions.php` seed arrays -> database seeders/services
- `storage/app/data/*.json` -> database tables เช่น courses, students, assignments, grades, audit_logs
