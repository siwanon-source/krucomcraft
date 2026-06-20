# KruComCraft Logo Style Guide

## 1. Brand Name

**KruComCraft**  
ภาษาไทย: **ครูคอมคราฟต์**

## 2. Brand Tagline

**สร้างสรรค์การเรียนรู้คอมพิวเตอร์ยุคใหม่**

English Micro Tagline:

**CODE · CREATE · CONNECT**

---

## 3. Logo Concept

โลโก้นี้ออกแบบในแนว **Advanced Tech-Education Brand** โดยใช้สัญลักษณ์หลักเป็น

- ตัวอักษร **K**
- วงโค้งรูป **C**
- สัญลักษณ์ **Code Bracket**
- เส้นวงจรและ node ดิจิทัล

เพื่อสื่อถึงความเป็นครูคอมพิวเตอร์ การเขียนโค้ด เทคโนโลยี การเรียนรู้ และการสร้างสรรค์ผลงานดิจิทัล

---

## 4. Logo Meaning

| Element | Meaning |
|---|---|
| K | Kru, Knowledge, KruComCraft |
| C Arc | Com, Craft, Community, Continuous Learning |
| Code Bracket | Coding, Programming, Digital Skill |
| Circuit Nodes | Technology, AI, Network, Digital System |
| Purple Dot | Creativity, Craft, Interaction |
| Blue Gradient | Trust, Education, Technology |
| Cyan/Green Arc | Innovation, Growth, Learning Progress |

---

## 5. Color Palette

| Token | Hex | Usage |
|---|---|---|
| Primary Blue | `#2563EB` | Main brand, KruCom |
| Craft Purple | `#7C3AED` | Craft, creativity, code bracket |
| Tech Cyan | `#0891B2` | Technology, connection |
| Learning Green | `#059669` | Growth, learning, success |
| Dark Text | `#0F172A` | Main wordmark text |
| Muted Text | `#64748B` | Subtitle and secondary text |
| Light Background | `#F0F4FB` | Website background |
| Border | `#E8EDF7` | Card and icon border |

---

## 6. Typography

| Usage | Font |
|---|---|
| Logo Wordmark | Kanit Bold / SemiBold |
| Thai Tagline | Sarabun Regular / Medium |
| Website Heading | Kanit |
| Website Body | Sarabun |

Fallback:

```css
font-family: Kanit, Sarabun, Arial, sans-serif;
```

---

## 7. Logo Files

### `KruComCraft_logo_horizontal.svg`
ใช้สำหรับ Header เว็บไซต์, หน้า Login, เอกสารนำเสนอ, ปกคู่มือ และ Banner

### `KruComCraft_logo_mark.svg`
ใช้สำหรับ Favicon, App Icon, Profile Picture, Social Media Icon และ Watermark ขนาดเล็ก

### `KruComCraft_logo_wordmark.svg`
ใช้สำหรับ Header แบบแคบ, Footer และเอกสารที่ไม่ต้องใช้ icon

### `KruComCraft_logo_preview.html`
ใช้เปิดดูตัวอย่างโลโก้บน browser

---

## 8. Usage Rules

### Do

- ใช้โลโก้บนพื้นหลังขาวหรือฟ้าอ่อน
- เว้นพื้นที่รอบโลโก้อย่างน้อยเท่ากับความสูงตัว K
- ใช้ไฟล์ SVG เป็นหลัก
- ใช้สีตาม palette เท่านั้น
- ใช้ horizontal logo กับ header เว็บไซต์
- ใช้ mark icon กับ favicon/app icon

### Do Not

- ห้ามยืดโลโก้ผิดสัดส่วน
- ห้ามเปลี่ยนสีแบบสุ่ม
- ห้ามใส่ shadow หนักเกินไป
- ห้ามวางบนพื้นหลังที่ contrast ต่ำ
- ห้ามใช้ emoji แทน brand icon
- ห้ามหมุนหรือเอียงโลโก้
- ห้ามตัดบางส่วนของโลโก้

---

## 9. CSS Brand Token

```css
:root {
  --kc-blue: #2563EB;
  --kc-purple: #7C3AED;
  --kc-cyan: #0891B2;
  --kc-green: #059669;
  --kc-dark: #0F172A;
  --kc-muted: #64748B;
  --kc-bg: #F0F4FB;
  --kc-border: #E8EDF7;
}
```

---

## 10. Recommended Website Usage

```html
<a class="brand" href="/">
  <img src="/assets/logo/KruComCraft_logo_horizontal.svg" alt="KruComCraft">
</a>
```

Favicon:

```html
<link rel="icon" type="image/svg+xml" href="/assets/logo/KruComCraft_logo_mark.svg">
```
