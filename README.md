# Portfolio — Ariel Maulidibillah

Personal portfolio website untuk **Ariel Maulidibillah**, Fresh Graduate S1 Teknik Informatika Universitas Muhammadiyah Sukabumi.

Website ini berfungsi sebagai personal branding, showcase project, dan channel kontak profesional untuk recruiter, HRD, maupun client potensial.

🌐 **Live Demo:** [https://portfolio-ariel.onrender.com](https://portfolio-ariel.onrender.com)

---

## ✨ Features

### Public

- 🎨 Modern, minimalist, responsive design
- 🌗 Dark & Light mode (tersimpan di localStorage)
- 🎯 Hero section dengan CTA (View Projects, Download CV, Contact)
- 📖 About, Education (timeline), Skills (grouped)
- 🗂️ Featured Projects + All Projects dengan filter kategori
- 📄 Project detail page lengkap dengan narasi
- 📱 Floating WhatsApp button
- 🔗 Contact section dengan WhatsApp, Email, GitHub, LinkedIn, Instagram
- ⚡ Lazy loading image, lightweight (tanpa Node.js di production)
- 🔍 SEO-friendly (meta tag, Open Graph, semantic HTML)
- 🚫 Custom 404 & 500 error pages

### Admin Panel

- 🔐 Login single-admin (tanpa register, tanpa forgot password)
- 🛡️ Rate limiting login (5 attempt/menit)
- 📝 Full CRUD: Projects, Skills, Educations, Social Links
- 👤 Edit Profile (bio, headline, foto, CV)
- 📬 Inbox untuk pesan dari contact form
- ⭐ Toggle featured project
- 🖼️ Upload project image

---

## 🛠️ Tech Stack

| Layer                     | Teknologi                                     |
| ------------------------- | --------------------------------------------- |
| **Backend**               | Laravel 13, PHP 8.3+                          |
| **Frontend**              | Blade, Bootstrap 5 (CDN), Vanilla JS          |
| **Database (local)**      | MySQL 5.7+                                    |
| **Database (production)** | PostgreSQL (Render)                           |
| **Auth**                  | Manual (`Auth::attempt` + custom controllers) |
| **Fonts**                 | Inter (Google Fonts)                          |
| **Icons**                 | Bootstrap Icons                               |
| **Deployment**            | Render.com (Docker)                           |

---

## 📁 Project Structure

---

## 🚀 Local Development

### Prasyarat

- PHP 8.3+
- Composer 2.2+
- MySQL 5.7+
- Git

### Setup

```bash
git clone https://github.com/ArielMaullid/portfolio_ariel.git
cd portfolio_ariel
composer install
cp .env.example .env
php artisan key:generate
```
