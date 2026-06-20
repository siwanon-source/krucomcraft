# KruComCraft  
## เอกสารวิเคราะห์และออกแบบระบบเว็บไซต์คุณครู  
### Teacher Website / QR Grading / Learning Media / Blog / Portfolio / Paid Course / Booking Platform

---

## 0. ข้อมูลเอกสาร

| รายการ | รายละเอียด |
|---|---|
| ชื่อโปรเจค | **KruComCraft** |
| เจ้าของแนวคิด | ครูศิวานนท์ คำชนะ |
| ประเภทระบบ | เว็บไซต์คุณครู + ระบบจัดการรายวิชา + ตรวจงาน QR + LMS + Portfolio + Booking |
| บทบาทผู้จัดทำเอกสาร | Systems Analyst: SA |
| เวอร์ชันเอกสาร | 1.0 |
| วันที่จัดทำ | 17 มิถุนายน 2569 |
| Design Base | ยึดตามไฟล์ HTML/CSS ต้นแบบ “สื่อการสอน ภาคเรียนที่ 2/2568” |
| หลักการสำคัญ | **ออกแบบต่อยอดจากดีไซน์เดิมเท่านั้น ไม่เปลี่ยน Visual Language** |

---

# 1. Executive Summary

**KruComCraft** คือแพลตฟอร์มเว็บไซต์คุณครูยุคใหม่ที่รวมงานสอน งานตรวจงาน งานเผยแพร่สื่อ งานแสดงผลงาน และการต่อยอดคอร์สออนไลน์ไว้ในระบบเดียว โดยมีหัวใจหลักคือ

1. ตรวจงานจากสมุดด้วย QR Code
2. จัดการหลายรายวิชา หลายห้อง หลายภาคเรียน
3. เผยแพร่สื่อการสอนแบบรองรับภาพ เสียง วิดีโอ และเอกสาร
4. ทำเว็บบล็อกความรู้ด้าน Computer, Coding, AI, Robotics และ Digital Learning
5. แสดงผลงานครูและผลงานนักเรียนแบบ Portfolio
6. เปิดคอร์สเรียนเสียเงิน
7. นัดเรียนแบบตัวต่อตัว
8. วิเคราะห์คะแนน งานค้าง และความก้าวหน้าของผู้เรียน
9. ใช้งานบนมือถือได้ดี โดยเฉพาะการสแกน QR Code ตรวจงาน

ระบบนี้ไม่ควรถูกออกแบบเป็นเว็บบล็อกทั่วไป แต่ควรเป็น **Teacher Learning Platform** ที่มีทั้งส่วน Public Website และ Admin Console สำหรับครู

---

# 2. Brand Concept

## 2.1 ชื่อโปรเจค

# **KruComCraft**

อ่านว่า: **ครู-คอม-คราฟต์ ฮับ**

## 2.2 ความหมายของชื่อ

| คำ | ความหมาย |
|---|---|
| **Kru** | คุณครู / ตัวตนของครูศิวานนท์ |
| **Com** | Computer, Computing, Coding, Computational Thinking |
| **Craft** | การสร้างสรรค์ การลงมือทำ งานฝีมือดิจิทัล |

## 2.3 Brand Positioning

> **KruComCraft คือศูนย์กลางการเรียนรู้คอมพิวเตอร์ยุคใหม่ ที่เชื่อมโยงการสอน การตรวจงาน สื่อการเรียนรู้ ผลงาน และคอร์สออนไลน์ไว้ในที่เดียว**

## 2.4 Tagline หลัก

> **สร้างสรรค์การเรียนรู้คอมพิวเตอร์ยุคใหม่**

## 2.5 Tagline ทางเลือก

- **KruComCraft — Learn. Code. Create.**
- **KruComCraft — Coding · AI · Media · Robotics · Digital Learning**
- **KruComCraft — แพลตฟอร์มสื่อการสอน ตรวจงาน และพัฒนาทักษะดิจิทัล**

---

# 3. Design Direction

## 3.1 แนวทางภาพรวม

ระบบต้องยึดดีไซน์ต้นแบบที่ผู้ใช้ให้มาเป็นหลักเท่านั้น โดยคงภาพลักษณ์ดังนี้

```text
Clean Academic Technology
Light Dashboard
Card-Based Layout
Soft Grid Background
Modern Teacher Platform
ฟ้าอ่อน + ขาว + ขอบบาง + shadow นุ่ม
```

## 3.2 ห้ามเปลี่ยน Visual Language

ห้ามเปลี่ยนไปใช้แนวต่อไปนี้

```text
❌ Dark Mode เป็นหลัก
❌ Cyberpunk / Neon หนัก
❌ Corporate เทาเข้ม
❌ Gradient จัดเกินไป
❌ Bootstrap Default ที่ยังไม่ปรับตาม token
❌ ใช้ emoji เป็น icon ใน production
❌ ใช้สีสุ่มนอกระบบ c1-c4
❌ ใช้ฟอนต์อื่นแทน Kanit / Sarabun
```

---

# 4. Design System

## 4.1 Color Tokens

ใช้สีจากต้นแบบเป็นหลัก

```css
:root {
  --bg: #f0f4fb;
  --surface: #e8edf7;
  --card: #ffffff;
  --card-hover: #f5f8ff;
  --border: rgba(99,120,180,0.14);

  --text: #1a2340;
  --muted: #6b7a99;

  --accent1: #2563eb;
  --accent2: #7c3aed;
  --accent3: #0891b2;
  --accent4: #059669;

  --c1: #dbeafe;
  --c2: #ede9fe;
  --c3: #cffafe;
  --c4: #d1fae5;

  --glow1: rgba(37,99,235,0.10);
  --glow2: rgba(124,58,237,0.10);
  --glow3: rgba(8,145,178,0.10);
  --glow4: rgba(5,150,105,0.10);
}
```

## 4.2 Module Color Mapping

| Module | Class | สี | ใช้กับ |
|---|---|---|---|
| รายวิชา / สื่อการสอน | `.c1` | Blue `#2563eb` | Course, Lesson, Teaching Media |
| ตรวจงาน QR / คะแนน | `.c2` | Purple `#7c3aed` | QR Scan, Grading, Score |
| Blog / Portfolio | `.c3` | Cyan `#0891b2` | Blog, Portfolio, Gallery |
| คอร์สเสียเงิน / นัดเรียน / Payment | `.c4` | Green `#059669` | Paid Course, Booking, Payment |

## 4.3 Typography

ใช้ฟอนต์ตามต้นแบบ

```html
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700&family=Sarabun:wght@300;400;500;600&display=swap" rel="stylesheet">
```

| ส่วน | Font | Weight |
|---|---|---|
| H1 | Kanit | 700 |
| H2 / Section Title | Kanit | 600 |
| Badge | Kanit | 400-500 |
| Button | Kanit | 500 |
| Course Code | Kanit | 500 |
| Course Name | Kanit | 600 |
| Body Text | Sarabun | 300-500 |
| Metadata | Sarabun | 300-400 |
| Dashboard Number | Kanit | 700 |

## 4.4 Background

ต้องคง background grid แบบต้นแบบ

```css
body {
  font-family: 'Sarabun', sans-serif;
  background: var(--bg);
  color: var(--text);
  min-height: 100vh;
  overflow-x: hidden;
}

body::before {
  content: '';
  position: fixed;
  inset: 0;
  background-image:
    linear-gradient(rgba(37,99,235,0.06) 1px, transparent 1px),
    linear-gradient(90deg, rgba(37,99,235,0.06) 1px, transparent 1px);
  background-size: 40px 40px;
  pointer-events: none;
  z-index: 0;
}
```

---

# 5. Icon System

## 5.1 แนวทางหลัก

ในไฟล์ต้นแบบมีการใช้ emoji เพื่อสื่อ icon แต่ใน production ให้เปลี่ยนเป็น **Inline SVG Icon** ทั้งหมด เพื่อให้ดูเป็นมืออาชีพ คุมสีได้ และเข้ากับ Design System

## 5.2 SVG Rule

```text
- ใช้ inline SVG
- stroke: currentColor
- fill: none
- stroke-width: 1.8 หรือ 2
- stroke-linecap: round
- stroke-linejoin: round
- ขนาด SVG: 24x24
- กล่อง icon: 48x48
- icon ใช้สีตาม class c1-c4
- ห้ามใช้ emoji ใน production
```

## 5.3 CSS กลางสำหรับ SVG

```css
.svg-icon svg {
  width: 24px;
  height: 24px;
  stroke: currentColor;
  stroke-width: 1.8;
  fill: none;
  stroke-linecap: round;
  stroke-linejoin: round;
}

.c1 .svg-icon { color: var(--accent1); }
.c2 .svg-icon { color: var(--accent2); }
.c3 .svg-icon { color: var(--accent3); }
.c4 .svg-icon { color: var(--accent4); }
```

## 5.4 SVG Icon Library

### Dashboard

```html
<svg viewBox="0 0 24 24"><path d="M3 11.5 12 4l9 7.5"></path><path d="M5 10.5V20h14v-9.5"></path><path d="M9 20v-6h6v6"></path></svg>
```

### รายวิชา

```html
<svg viewBox="0 0 24 24"><path d="M4 19.5V5a2 2 0 0 1 2-2h12v18H6a2 2 0 0 1-2-1.5Z"></path><path d="M8 7h7"></path><path d="M8 11h8"></path></svg>
```

### ตรวจงาน QR

```html
<svg viewBox="0 0 24 24"><path d="M4 4h6v6H4z"></path><path d="M14 4h6v6h-6z"></path><path d="M4 14h6v6H4z"></path><path d="M14 14h2"></path><path d="M18 14h2v2"></path><path d="M20 18v2h-4"></path><path d="M14 18h1"></path></svg>
```

### คะแนน

```html
<svg viewBox="0 0 24 24"><path d="M9 11l2 2 4-5"></path><path d="M4 4h16v16H4z"></path><path d="M7 17h10"></path></svg>
```

### สื่อการสอน

```html
<svg viewBox="0 0 24 24"><path d="M4 5h16v14H4z"></path><path d="M9 9l6 3-6 3z"></path></svg>
```

### Blog

```html
<svg viewBox="0 0 24 24"><path d="M5 4h14v16H5z"></path><path d="M8 8h8"></path><path d="M8 12h8"></path><path d="M8 16h5"></path></svg>
```

### Portfolio

```html
<svg viewBox="0 0 24 24"><path d="M4 7h16v13H4z"></path><path d="M9 7V5h6v2"></path><path d="M8 13h8"></path></svg>
```

### Paid Course

```html
<svg viewBox="0 0 24 24"><path d="M4 6h16v12H4z"></path><path d="M8 10h4"></path><path d="M8 14h8"></path><path d="M17 10h1"></path></svg>
```

### Booking

```html
<svg viewBox="0 0 24 24"><path d="M7 3v4"></path><path d="M17 3v4"></path><path d="M4 8h16"></path><path d="M5 5h14v15H5z"></path><path d="M9 13h2"></path><path d="M13 13h2"></path><path d="M9 17h2"></path></svg>
```

---

# 6. Core Layout

## 6.1 Header Hero

ใช้โครงเดิม

```text
Header
 ├── Header Badge
 ├── H1
 ├── Gradient Span
 └── Subtitle
```

### ข้อความแนะนำ

```text
Badge:
เว็บไซต์ครู · วิทยาศาสตร์และเทคโนโลยี

H1:
KruComCraft

Gradient Span:
สื่อการสอน · ตรวจงาน QR · คอร์สออนไลน์

Subtitle:
ศูนย์กลางการเรียนรู้ รายวิชา สื่อการสอน ผลงาน และระบบตรวจงานด้วย QR Code
```

## 6.2 Sticky Navigation

ใช้ sticky nav แบบต้นแบบ

```css
nav {
  position: sticky;
  top: 0;
  z-index: 100;
  background: rgba(240,244,251,0.92);
  backdrop-filter: blur(20px);
  border-bottom: 1px solid var(--border);
  padding: 0 40px;
  display: flex;
  align-items: center;
  gap: 4px;
  height: 56px;
  overflow-x: auto;
  scrollbar-width: none;
}
```

### เมนูหลัก

```text
หน้าหลัก
รายวิชา
ตรวจงาน QR
สื่อการสอน
บทความ
ผลงาน
คอร์สเรียน
นัดเรียน
เข้าสู่ระบบ
```

---

# 7. Sitemap

## 7.1 Public Website

```text
/
├── /courses
├── /courses/{course-slug}
├── /media
├── /media/{media-id}
├── /blog
├── /blog/{post-slug}
├── /portfolio
├── /portfolio/{project-slug}
├── /academy
├── /academy/{course-slug}
├── /booking
├── /about
├── /contact
└── /login
```

## 7.2 Student Portal

```text
/student/dashboard
├── /student/courses
├── /student/assignments
├── /student/scores
├── /student/media
├── /student/certificates
└── /student/profile
```

## 7.3 Teacher/Admin Console

```text
/admin/dashboard
├── /admin/academic-years
├── /admin/terms
├── /admin/courses
├── /admin/classrooms
├── /admin/students
├── /admin/assignments
├── /admin/qr-grading
├── /admin/gradebook
├── /admin/media
├── /admin/blog
├── /admin/portfolio
├── /admin/academy
├── /admin/bookings
├── /admin/payments
├── /admin/reports
├── /admin/users
├── /admin/roles
└── /admin/settings
```

---

# 8. Functional Requirements

## 8.1 ระบบหน้าแรก

### เป้าหมาย

หน้าแรกต้องเป็นศูนย์รวมภาพรวมของเว็บไซต์ครู โดยยังคง layout แบบต้นแบบ

### ฟังก์ชัน

- แสดง Hero Section
- แสดง Stat Cards
- แสดง Feature Cards
- แสดงรายวิชาล่าสุด
- แสดงสื่อการสอนล่าสุด
- แสดงผลงานเด่น
- แสดงบทความล่าสุด
- แสดงคอร์สแนะนำ
- ปุ่มเข้าสู่ระบบ
- ปุ่มเข้าสู่ระบบตรวจงาน QR สำหรับครู

### Stat Cards แนะนำ

```text
รายวิชา
สื่อการสอน
วิดีโอ
ใบงาน / Lab
งานที่ตรวจแล้ว
งานค้างส่ง
คอร์สออนไลน์
นัดเรียน
```

---

## 8.2 ระบบหลายรายวิชา

### เป้าหมาย

รองรับการจัดการรายวิชาหลายวิชา หลายห้อง หลายปีการศึกษา และหลายภาคเรียน

### โครงสร้าง

```text
ปีการศึกษา
 └── ภาคเรียน
      └── รายวิชา
           └── ห้องเรียน
                └── นักเรียน
                     └── งาน / คะแนน / สื่อ
```

### ฟังก์ชัน

- เพิ่ม/แก้ไข/ลบรายวิชา
- ระบุรหัสวิชา
- ระบุชื่อวิชา
- ระบุระดับชั้น
- ระบุจำนวนหน่วยกิต
- ระบุคำอธิบายรายวิชา
- ผูกรายวิชากับห้องเรียน
- ผูกนักเรียนกับรายวิชา
- จัดกลุ่มหน่วยการเรียนรู้
- จัดบทเรียน
- แนบสื่อ
- แนบใบงาน
- Export รายชื่อนักเรียน
- Export คะแนนรายวิชา

### ตัวอย่างรายวิชา

```text
ว31283 ความรู้เบื้องต้นเกี่ยวกับอีสปอร์ต
ว32283 การพัฒนาเกม 2D
ว32293 การเขียนโปรแกรมภาษาคอมพิวเตอร์
ว33284 การเขียนโปรแกรมพัฒนาหุ่นยนต์
ว21182 วิทยาการคำนวณ 1
```

---

## 8.3 ระบบตรวจงานจากสมุดด้วย QR Code

### เป้าหมาย

ครูสามารถตรวจสมุดหรือใบงานจริงได้รวดเร็ว โดยสแกน QR Code ที่ติดอยู่บนสมุดนักเรียน แล้วบันทึกคะแนน เวลา สถานะ และหมายเหตุ

### QR Code ที่ควรมี

#### 1. QR ประจำตัวนักเรียน

ใช้ติดที่หน้าปกสมุดหรือแฟ้มงานของนักเรียน

ตัวอย่างข้อมูลภายในระบบ

```text
student_qr_token = UUID หรือ Signed Token
```

ไม่ควรใช้เลขประจำตัวนักเรียนตรง ๆ ใน QR เพื่อความปลอดภัย

#### 2. QR ประจำงาน

ใช้แทนรหัสงานหรือใบงาน

```text
assignment_qr_token = UUID หรือ Signed Token
```

### Workflow ตรวจงาน

```text
1. ครูเข้าสู่ระบบ
2. ไปที่เมนู ตรวจงาน QR
3. เลือกรายวิชา
4. เลือกงาน/ใบงาน
5. เปิดกล้องสแกน QR จากสมุดนักเรียน
6. ระบบแสดงชื่อนักเรียน ห้องเรียน และสถานะล่าสุด
7. ครูกรอกคะแนน
8. เลือกสถานะ
9. เพิ่มหมายเหตุหรือภาพหลักฐาน
10. กดบันทึก
11. ระบบพร้อมสแกนคนถัดไปทันที
```

### สถานะงาน

```text
ส่งตรงเวลา
ส่งช้า
ต้องแก้ไข
ขาดส่ง
ตรวจแล้ว
รอตรวจ
ยกเลิกคะแนน
```

### ข้อมูลที่ต้องบันทึก

| Field | รายละเอียด |
|---|---|
| assignment_id | งาน/ใบงาน |
| student_id | นักเรียน |
| teacher_id | ผู้ตรวจ |
| score | คะแนนที่ได้ |
| full_score | คะแนนเต็ม |
| status | สถานะงาน |
| checked_at | วันเวลาที่ตรวจ |
| submitted_at | วันเวลาที่รับงาน |
| note | หมายเหตุ |
| evidence_image | ภาพหลักฐาน |
| device_info | อุปกรณ์ที่ใช้ตรวจ |
| ip_address | IP ผู้ตรวจ |
| audit_log_id | ประวัติการแก้ไขคะแนน |

### UX สำคัญ

- ปุ่ม “บันทึกแล้วตรวจคนถัดไป”
- ระบบสั่นหรือแสดง visual feedback เมื่อสแกนสำเร็จ
- ถ้าสแกนซ้ำในงานเดิม ต้องขึ้นเตือนว่ามีคะแนนอยู่แล้ว
- ถ้าแก้คะแนนเดิม ต้องบันทึก audit log
- รองรับการตรวจแบบ offline-first ในอนาคต

---

## 8.4 ระบบสื่อการสอน

### เป้าหมาย

รองรับสื่อหลากหลายรูปแบบและผูกกับรายวิชา/บทเรียนได้

### ประเภทสื่อ

| ประเภท | ไฟล์ |
|---|---|
| รูปภาพ | jpg, png, webp |
| เอกสาร | pdf, docx, pptx, xlsx |
| เสียง | mp3, wav |
| วิดีโอ | mp4 หรือ YouTube Embed |
| โค้ด | zip, txt, md |
| ลิงก์ภายนอก | Google Drive, YouTube, Canva, Git repository |

### ฟังก์ชัน

- อัปโหลดไฟล์
- แยกหมวดตามรายวิชา
- แยกตามหน่วย/บทเรียน
- ตั้งค่าการเผยแพร่ public/private
- จำกัดเฉพาะนักเรียนในรายวิชา
- จำกัดเฉพาะผู้ซื้อคอร์ส
- นับจำนวนดาวน์โหลด
- นับจำนวนการเปิดดู
- เพิ่ม tag
- ค้นหา
- กรองตามประเภทไฟล์
- Preview ไฟล์ PDF/Video/Image
- Download file

---

## 8.5 ระบบ Blog

### เป้าหมาย

สร้างพื้นที่เผยแพร่ความรู้ ภาพลักษณ์ครู และเนื้อหาทางวิชาการ

### หมวดบทความ

```text
Coding
AI
IoT
Robotics
E-Sports
Game Development
Graphic Design
Computational Thinking
Digital Learning
Best Practice
Classroom Reflection
```

### ฟังก์ชัน

- เขียนบทความ
- ใส่ cover image
- ใส่ tag
- ตั้ง slug
- ตั้ง meta title
- ตั้ง meta description
- บันทึก draft
- publish/unpublish
- pin post
- share link
- related posts
- view count

---

## 8.6 ระบบ Portfolio

### เป้าหมาย

แสดงผลงานที่ผ่านมาอย่างเป็นมืออาชีพ ทั้งผลงานครู ผลงานนักเรียน และโครงงานนวัตกรรม

### หมวดผลงาน

```text
ผลงานครู
ผลงานนักเรียน
สื่อการสอน
นวัตกรรมการเรียนรู้
โครงงาน Coding
โครงงาน AI
โครงงาน IoT
โครงงาน Robotics
รางวัลและเกียรติบัตร
Best Practice
```

### ฟังก์ชัน

- เพิ่มผลงาน
- Gallery รูปภาพ
- แนบไฟล์เอกสาร
- แนบวิดีโอ
- ใส่ปีผลงาน
- ใส่ประเภทผลงาน
- ใส่ระดับผลงาน เช่น โรงเรียน/เขต/ประเทศ
- ใส่ผู้ร่วมงาน
- ใส่เทคโนโลยีที่ใช้
- Filter ตามปี
- Filter ตามประเภท
- Featured Project

---

## 8.7 ระบบคอร์สเรียนเสียเงิน

### เป้าหมาย

รองรับการเปิดคอร์สออนไลน์หรือคอร์สเสริมทักษะนอกเวลา

### ประเภทคอร์ส

```text
คอร์สฟรี
คอร์สเสียเงินแบบซื้อขาด
คอร์สสด
คอร์สกลุ่มเล็ก
คอร์สตัวต่อตัว
คอร์สสำหรับโรงเรียน/องค์กร
```

### ฟังก์ชัน

- Landing page คอร์ส
- ราคา
- รายละเอียดสิ่งที่จะได้เรียน
- Curriculum
- Video lesson
- เอกสารประกอบ
- แบบทดสอบ
- Progress
- Certificate
- Enrollment
- Coupon
- Payment
- Review
- Instructor profile

### สถานะการเข้าเรียน

```text
ยังไม่สมัคร
สมัครแล้ว
รอชำระเงิน
ชำระเงินแล้ว
กำลังเรียน
เรียนจบ
ออกใบประกาศแล้ว
หมดอายุ
```

---

## 8.8 ระบบนัดเรียนตัวต่อตัว

### เป้าหมาย

ให้ผู้เรียนหรือผู้ปกครองสามารถจองเวลาเรียนกับครูได้

### ฟังก์ชัน

- เลือกบริการ
- เลือกวันเวลา
- เลือกรูปแบบ Online/Onsite
- กรอกข้อมูลผู้เรียน
- แนบข้อมูลพื้นฐาน
- ชำระเงิน
- ยืนยันการจอง
- เลื่อนนัด
- ยกเลิกนัด
- แจ้งเตือนก่อนเรียน
- บันทึกสรุปหลังเรียน

### สถานะการจอง

```text
รอชำระเงิน
ชำระเงินแล้ว
รอยืนยัน
ยืนยันแล้ว
เรียนเสร็จแล้ว
เลื่อนนัด
ยกเลิก
คืนเงิน
```

---

# 9. User Roles & Permission

| Role | คำอธิบาย |
|---|---|
| Guest | ผู้เข้าชมทั่วไป |
| Student | นักเรียนในรายวิชา |
| Parent | ผู้ปกครองที่ดูข้อมูลแบบจำกัด |
| Course Learner | ผู้เรียนคอร์สออนไลน์ |
| Teacher | ครูผู้สอน |
| Admin | ผู้ดูแลระบบ |
| Super Admin | ผู้ดูแลสูงสุด |

## 9.1 Permission หลัก

| Permission | Guest | Student | Parent | Teacher | Admin |
|---|---|---|---|---|---|
| อ่านบทความ | ✅ | ✅ | ✅ | ✅ | ✅ |
| ดูสื่อ public | ✅ | ✅ | ✅ | ✅ | ✅ |
| ดูสื่อเฉพาะรายวิชา | ❌ | ✅ | เฉพาะบุตรหลาน | ✅ | ✅ |
| ดูคะแนน | ❌ | เฉพาะตนเอง | เฉพาะบุตรหลาน | ✅ | ✅ |
| ตรวจงาน QR | ❌ | ❌ | ❌ | ✅ | ✅ |
| แก้คะแนน | ❌ | ❌ | ❌ | ✅ | ✅ |
| จัดการรายวิชา | ❌ | ❌ | ❌ | ✅ | ✅ |
| จัดการคอร์สเสียเงิน | ❌ | ❌ | ❌ | ✅ | ✅ |
| จัดการผู้ใช้ | ❌ | ❌ | ❌ | ❌ | ✅ |

---

# 10. Database Design

## 10.1 ตารางหลัก

```text
users
roles
permissions
role_user
permission_role

students
parents
teachers
academic_years
terms
classrooms
courses
course_sections
section_students

units
lessons
assignments
assignment_submissions
grading_records
grading_audit_logs
qr_codes

media_files
media_categories
lesson_media

blog_posts
blog_categories
blog_tags
blog_post_tags

portfolio_projects
portfolio_categories
portfolio_media

online_courses
online_course_lessons
online_course_enrollments
quizzes
quiz_questions
quiz_attempts

booking_services
booking_slots
bookings

payments
payment_transactions
coupons
certificates
notifications
settings
activity_logs
```

## 10.2 ตาราง students

```sql
CREATE TABLE students (
  id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  student_code VARCHAR(50) UNIQUE NOT NULL,
  prefix VARCHAR(30),
  first_name VARCHAR(100) NOT NULL,
  last_name VARCHAR(100) NOT NULL,
  classroom_id BIGINT UNSIGNED,
  qr_token CHAR(36) UNIQUE NOT NULL,
  status ENUM('active','inactive','graduated') DEFAULT 'active',
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);
```

## 10.3 ตาราง courses

```sql
CREATE TABLE courses (
  id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  course_code VARCHAR(50) NOT NULL,
  course_name VARCHAR(255) NOT NULL,
  level VARCHAR(50),
  credit DECIMAL(3,1),
  description TEXT,
  color_class ENUM('c1','c2','c3','c4') DEFAULT 'c1',
  status ENUM('draft','active','archived') DEFAULT 'active',
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);
```

## 10.4 ตาราง assignments

```sql
CREATE TABLE assignments (
  id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  course_id BIGINT UNSIGNED NOT NULL,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  full_score DECIMAL(6,2) DEFAULT 10,
  due_date DATETIME NULL,
  qr_token CHAR(36) UNIQUE,
  status ENUM('draft','open','closed') DEFAULT 'open',
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);
```

## 10.5 ตาราง grading_records

```sql
CREATE TABLE grading_records (
  id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  assignment_id BIGINT UNSIGNED NOT NULL,
  student_id BIGINT UNSIGNED NOT NULL,
  teacher_id BIGINT UNSIGNED NOT NULL,
  score DECIMAL(6,2) NOT NULL DEFAULT 0,
  full_score DECIMAL(6,2) NOT NULL DEFAULT 10,
  status ENUM('submitted_on_time','submitted_late','need_revision','missing','checked') DEFAULT 'checked',
  note TEXT NULL,
  evidence_image VARCHAR(255) NULL,
  checked_at DATETIME NOT NULL,
  submitted_at DATETIME NULL,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  UNIQUE KEY unique_assignment_student (assignment_id, student_id)
);
```

## 10.6 ตาราง grading_audit_logs

```sql
CREATE TABLE grading_audit_logs (
  id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  grading_record_id BIGINT UNSIGNED NOT NULL,
  changed_by BIGINT UNSIGNED NOT NULL,
  old_score DECIMAL(6,2),
  new_score DECIMAL(6,2),
  old_status VARCHAR(50),
  new_status VARCHAR(50),
  reason TEXT NULL,
  ip_address VARCHAR(45),
  user_agent TEXT,
  created_at TIMESTAMP NULL
);
```

---

# 11. UI Component Specification

## 11.1 HeaderHero

### Props

```text
badge
title
gradientText
subtitle
```

### ตัวอย่าง

```text
badge: เว็บไซต์ครู · วิทยาศาสตร์และเทคโนโลยี
title: KruComCraft
gradientText: สื่อการสอน · ตรวจงาน QR · คอร์สออนไลน์
subtitle: ศูนย์กลางการเรียนรู้ รายวิชา สื่อการสอน ผลงาน และระบบตรวจงานด้วย QR Code
```

---

## 11.2 StatCard

### Props

```text
iconSvg
value
label
colorClass
```

### ใช้กับ

```text
รายวิชา
สื่อการสอน
วิดีโอ
ใบงาน / Lab
ตรวจแล้ว
งานค้าง
คอร์สออนไลน์
นัดเรียน
```

---

## 11.3 FeatureCard

### Props

```text
colorClass
iconSvg
title
description
stats
buttonText
href
```

### ตัวอย่าง Feature

```text
ตรวจงาน QR
จัดการรายวิชา
คลังสื่อการสอน
ผลงานที่ผ่านมา
คอร์สออนไลน์
นัดเรียนตัวต่อตัว
```

---

## 11.4 CourseCard

### Props

```text
colorClass
courseCode
courseName
level
chapterCount
credit
chapters[]
progress
href
```

### โครงสร้าง

```text
card-accent-bar
card-header
 ├── card-icon
 └── card-meta
      ├── course-code
      └── course-name
card-divider
card-stats
card-chapters
card-footer
```

---

## 11.5 ChapterRow

### Props

```text
number
title
type
href
```

### Type

```text
Slide
Video
PDF
Lab
Quiz
งาน
QR
Paid
```

---

# 12. Page Design Specification

## 12.1 หน้าแรก

### Sections

```text
HeaderHero
StickyNav
StatsRow
Section: ระบบหลัก
Section: รายวิชาทั้งหมด
Section: สื่อการสอนล่าสุด
Section: ผลงานเด่น
Section: บทความล่าสุด
Footer
```

---

## 12.2 หน้ารายวิชา

### เนื้อหา

```text
Header: รายวิชาทั้งหมด
Filter: ปีการศึกษา / ภาคเรียน / ระดับชั้น / ห้องเรียน
Course Grid
Course Detail
Unit List
Lesson List
Assignments
Media
Score Summary
```

---

## 12.3 หน้าตรวจงาน QR

### Layout

```text
Header: ตรวจงานด้วย QR Code
Subtitle: สแกน QR จากสมุดนักเรียนเพื่อบันทึกคะแนนและเวลา

Grid 2 Columns
 ├── Card ซ้าย: QR Scanner Camera
 └── Card ขวา: Grade Form
```

### Grade Form

```text
รายวิชา
งาน/ใบงาน
ชื่อนักเรียน
ห้อง
คะแนนเต็ม
คะแนนที่ได้
สถานะ
หมายเหตุ
แนบภาพหลักฐาน
ปุ่มบันทึกคะแนน
ปุ่มตรวจคนถัดไป
```

---

## 12.4 หน้าคลังสื่อ

### Layout

```text
Filter Bar
 ├── รายวิชา
 ├── ประเภทสื่อ
 ├── หน่วยการเรียนรู้
 └── ค้นหา

Media Grid
 ├── Media Card
 ├── File Type Badge
 ├── View Count
 └── Download Button
```

---

## 12.5 หน้า Blog

### Layout

```text
Featured Post
Category Tabs
Post Grid
Search
Tag
Pagination
```

---

## 12.6 หน้า Portfolio

### Layout

```text
Portfolio Hero
Filter by Year
Filter by Category
Project Grid
Project Detail
Gallery
Download Attachment
```

---

## 12.7 หน้า Academy

### Layout

```text
Course Hero
Paid Course Grid
Course Detail
Curriculum
Lesson Preview
Price Card
Enroll Button
Payment Status
```

---

## 12.8 หน้า Booking

### Layout

```text
Booking Service Cards
Calendar Slot
Student Info Form
Payment Box
Booking Confirmation
```

---

# 13. Non-Functional Requirements

## 13.1 Security

```text
- Password Hash
- Role-Based Access Control
- CSRF Protection
- SQL Injection Protection
- XSS Protection
- File Upload Validation
- QR Token แบบเดาไม่ได้
- Audit Log ทุกการแก้คะแนน
- จำกัดสิทธิ์การดูคะแนน
- Backup Database
```

## 13.2 Performance

```text
- หน้า public ต้องโหลดเร็ว
- ใช้ pagination
- ใช้ lazy loading สำหรับรูป
- ใช้ cache สำหรับบทความ/portfolio
- ไฟล์วิดีโอควรฝังจาก YouTube หรือ storage แยก
- งานส่ง email/ออก certificate ควรใช้ queue
```

## 13.3 Responsive

ต้องรองรับ

```text
Desktop
Tablet
Mobile
มือถือครูสำหรับสแกน QR
```

โดยเฉพาะหน้า QR Scanner ต้องออกแบบ mobile-first

## 13.4 Accessibility

```text
- สีต้อง contrast เพียงพอ
- ปุ่มต้องขนาดกดง่าย
- SVG icon ต้องมี aria-hidden ถ้าเป็นตกแต่ง
- รูปภาพต้องมี alt text
- ไม่ใช้สีเป็นตัวสื่อสถานะอย่างเดียว
```

---

# 14. Technology Recommendation

## 14.1 Stack แนะนำ

```text
Backend: Laravel
Frontend: Blade + Livewire หรือ Vue/React ตามขนาดระบบ
CSS: Bootstrap 5.3 + Custom Design Tokens
Database: MySQL / MariaDB
Storage: Local Storage เริ่มต้น, S3-Compatible ในอนาคต
Auth: Laravel Auth + Role Permission
QR Scanner: HTML5 QR Scanner Library
Payment: PromptPay / Payment Gateway
Notification: Email / LINE OA
```

## 14.2 เหตุผล

- Laravel เหมาะกับระบบหลังบ้านและฐานข้อมูลเชิงธุรกิจ
- Bootstrap 5.3 เข้ากับดีไซน์ต้นแบบและ responsive ได้เร็ว
- Livewire เหมาะกับฟอร์มหลังบ้าน เช่น ตรวจงาน คะแนน Dashboard
- MySQL/MariaDB เพียงพอสำหรับข้อมูลนักเรียน รายวิชา คะแนน และคอร์ส
- PWA เหมาะกับการสแกน QR ผ่านมือถือครู

---

# 15. Development Phases

## Phase 1: Foundation + Design System

```text
- สร้าง Laravel Project
- วาง Design Token
- สร้าง Layout หลัก
- สร้าง HeaderHero
- สร้าง StickyNav
- สร้าง Card Component
- สร้าง SVG Icon Component
- หน้าแรกเบื้องต้น
```

## Phase 2: Course & Media

```text
- จัดการปีการศึกษา
- จัดการภาคเรียน
- จัดการรายวิชา
- จัดการห้องเรียน
- จัดการนักเรียน
- อัปโหลดสื่อการสอน
- ผูกสื่อกับรายวิชา
```

## Phase 3: QR Grading

```text
- สร้าง QR นักเรียน
- สร้าง QR งาน
- สร้างหน้า Scanner
- บันทึกคะแนน
- แสดงสถานะงาน
- Export คะแนน
- Audit Log
```

## Phase 4: Blog & Portfolio

```text
- ระบบบทความ
- ระบบหมวดหมู่และ tag
- ระบบผลงาน
- Gallery
- Featured Project
```

## Phase 5: Academy & Booking

```text
- ระบบคอร์สเสียเงิน
- ระบบสมัครเรียน
- ระบบชำระเงิน
- ระบบนัดเรียน
- แจ้งเตือน
```

## Phase 6: Analytics & AI-ready

```text
- Dashboard วิเคราะห์คะแนน
- งานค้าง
- นักเรียนกลุ่มเสี่ยง
- รายงานรายห้อง
- เตรียม AI Feedback ในอนาคต
```

---

# 16. MVP Scope

## MVP ที่ควรทำก่อน

```text
1. หน้าแรกตาม Design System
2. รายวิชา
3. นักเรียน
4. ใบงาน
5. ตรวจงาน QR
6. รายงานคะแนน
7. คลังสื่อการสอน
8. Blog พื้นฐาน
9. Portfolio พื้นฐาน
```

## ยังไม่ควรทำใน MVP แรก

```text
- Payment Gateway เต็มระบบ
- Certificate อัตโนมัติ
- AI Feedback
- Parent Portal เต็มระบบ
- Offline-first ขั้นสูง
```

---

# 17. Acceptance Criteria

## 17.1 Design

```text
✅ ใช้ Kanit/Sarabun
✅ ใช้สีจาก token เท่านั้น
✅ มี background grid
✅ มี HeaderHero แบบต้นแบบ
✅ มี StickyNav แบบต้นแบบ
✅ Card radius 16px
✅ Hover translateY(-4px)
✅ SVG icon แทน emoji
✅ ใช้ c1-c4 ตาม module
```

## 17.2 QR Grading

```text
✅ สแกน QR นักเรียนได้
✅ เลือกรายวิชาได้
✅ เลือกงานได้
✅ บันทึกคะแนนได้
✅ บันทึกเวลาอัตโนมัติ
✅ มีสถานะงาน
✅ แก้คะแนนแล้วมี audit log
✅ Export คะแนนได้
```

## 17.3 Course Management

```text
✅ เพิ่มรายวิชาได้
✅ เพิ่มห้องเรียนได้
✅ ผูกนักเรียนกับห้องได้
✅ ผูกงานกับรายวิชาได้
✅ ดูคะแนนรายวิชาได้
```

## 17.4 Media

```text
✅ อัปโหลดเอกสารได้
✅ อัปโหลดรูปได้
✅ แนบวิดีโอได้
✅ แยกตามรายวิชาได้
✅ จำกัดสิทธิ์การเข้าถึงได้
```

---

# 18. Prompt สำหรับ Codex / Developer

```text
คุณคือ Senior Full-stack Developer ให้พัฒนาโปรเจค KruComCraft โดยยึด Design System จากไฟล์ HTML/CSS ต้นแบบเท่านั้น ห้ามเปลี่ยนแนว UI โดยรวม

Project:
- KruComCraft
- Teacher Learning Platform
- QR Grading
- Multi-Course Management
- Learning Media
- Blog
- Portfolio
- Paid Course
- Booking

Design Rules:
- ใช้ font Kanit สำหรับ heading, badge, button, course code
- ใช้ font Sarabun สำหรับ body
- ใช้สีจาก CSS variables เดิม ได้แก่ --bg, --surface, --card, --border, --text, --muted, --accent1, --accent2, --accent3, --accent4
- ใช้พื้นหลัง light blue พร้อม grid pattern แบบ body::before
- ใช้ header แบบ badge + h1 + gradient span + subtitle
- ใช้ sticky nav แบบเดิม มี backdrop-filter blur(20px)
- ใช้ card style เดิม border 1px, radius 16px, hover translateY(-4px), shadow glow ตาม class c1-c4
- ใช้ icon เป็น inline SVG เท่านั้น ห้ามใช้ emoji ใน production
- SVG icon ต้องใช้ stroke=currentColor, fill=none, stroke-width=1.8, stroke-linecap=round, stroke-linejoin=round
- ใช้ .card-icon ขนาด 48x48 และ icon ขนาด 24x24
- ใช้ class c1, c2, c3, c4 เพื่อคุมสีแต่ละ module

Module Color Mapping:
- c1 / accent1 Blue: รายวิชาและสื่อการสอน
- c2 / accent2 Purple: ตรวจงาน QR และคะแนน
- c3 / accent3 Cyan: Blog และ Portfolio
- c4 / accent4 Green: คอร์สเสียเงิน นัดเรียน และ Payment

Build Components:
- HeaderHero
- StickyNav
- StatCard
- FeatureCard
- CourseCard
- ChapterRow
- TypeBadge
- ProgressBar
- SvgIcon
- SectionLabel

Pages:
1. หน้าแรก Dashboard
2. หน้ารายวิชา
3. หน้าตรวจงานด้วย QR Code
4. หน้าคลังสื่อการสอน
5. หน้า Blog
6. หน้า Portfolio ผลงานที่ผ่านมา
7. หน้าคอร์สออนไลน์แบบเสียเงิน
8. หน้านัดเรียนตัวต่อตัว
9. หน้า Login/Admin Dashboard

Core Functional Requirements:
- จัดการรายวิชา
- จัดการห้องเรียน
- จัดการนักเรียน
- สร้าง QR นักเรียน
- สร้าง QR งาน
- สแกน QR เพื่อตรวจงาน
- บันทึกคะแนน เวลา สถานะ หมายเหตุ
- Audit log ทุกการแก้ไขคะแนน
- อัปโหลดสื่อการสอน
- Blog
- Portfolio
- Online Course
- Booking

ทุกหน้าและทุก component ต้องมี visual language เดียวกับไฟล์ต้นแบบ
```

---

# 19. สรุปข้อเสนอจาก SA

**KruComCraft** ควรถูกพัฒนาเป็นระบบเว็บไซต์ครูแบบครบวงจร โดยเริ่มจากส่วนที่ตอบโจทย์งานครูจริงที่สุดก่อน คือ

1. **Multi-Course Management**
2. **QR Grading**
3. **Learning Media**
4. **Blog**
5. **Portfolio**

จากนั้นจึงค่อยขยายไปยัง

1. **Paid Course**
2. **Booking**
3. **Payment**
4. **Certificate**
5. **AI Analytics**

หัวใจสำคัญที่สุดของโปรเจคนี้คือ **ต้องไม่หลุดจาก Design System เดิม** เพราะไฟล์ต้นแบบมี visual identity ที่ดีอยู่แล้ว ได้แก่ พื้นหลังฟ้าอ่อน, grid pattern, card สีขาว, accent 4 สี, Kanit/Sarabun, sticky nav และ card-based layout

ดังนั้นการพัฒนาระบบจริงควรทำในแนวทาง

> **ต่อยอดจากดีไซน์เดิมให้กลายเป็นแพลตฟอร์มครูเต็มระบบ ไม่ใช่ออกแบบใหม่ทั้งหมด**

---

# 20. Final Naming

## ชื่อหลัก

# **KruComCraft**

## ชื่อไทย

**ครูคอมคราฟต์ ฮับ**

## คำอธิบายสั้น

> แพลตฟอร์มเว็บไซต์ครูคอมพิวเตอร์ สำหรับสื่อการสอน ตรวจงาน QR จัดการรายวิชา แสดงผลงาน เปิดคอร์สออนไลน์ และนัดเรียนตัวต่อตัว

## Tagline

> **สร้างสรรค์การเรียนรู้คอมพิวเตอร์ยุคใหม่**
