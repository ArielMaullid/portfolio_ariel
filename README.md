---
title: Portfolio Ariel Maulidibillah
emoji: 👨‍💻
colorFrom: blue
colorTo: indigo
sdk: docker
app_port: 7860
pinned: false
license: mit
---

# Portfolio — Ariel Maulidibillah

Personal portfolio website untuk **Ariel Maulidibillah**, Fresh Graduate S1 Teknik Informatika Universitas Muhammadiyah Sukabumi.

Website ini berfungsi sebagai personal branding, showcase project, dan channel kontak profesional untuk recruiter, HRD, maupun client potensial.

🌐 **Live Demo:** [https://arielmaullid-portfolio-ariel.hf.space](https://arielmaullid-portfolio-ariel.hf.space)

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
- 🔗 Contact section dengan WhatsApp, Email, GitHub, LinkedIn
- ⚡ Lazy loading image, lightweight
- 🔍 SEO-friendly (meta tag, Open Graph, semantic HTML)
- 🚫 Custom 404 & 500 error pages

### Admin Panel
- 🔐 Login single-admin (tanpa register, tanpa forgot password)
- 🛡️ Rate limiting login (5 attempt/menit)
- 📝 Full CRUD: Projects, Skills, Educations, Social Links
- 👤 Edit Profile (bio, headline, foto, CV)
- 📬 Inbox untuk pesan dari contact form
- ⭐ Toggle featured project

---

## 🛠️ Tech Stack

| Layer | Teknologi |
|-------|-----------|
| **Backend** | Laravel 13, PHP 8.3+ |
| **Frontend** | Blade, Bootstrap 5 (CDN), Vanilla JS |
| **Database** | PostgreSQL (Neon) |
| **Auth** | Manual (`Auth::attempt` + custom controllers) |
| **Deployment** | Hugging Face Spaces (Docker) |

---

## 🔒 Security

- ✅ CSRF protection
- ✅ XSS protection via Blade auto-escape
- ✅ Password hashing (bcrypt)
- ✅ Rate limiting login (5 attempts/min)
- ✅ Rate limiting contact form (3 requests/min)
- ✅ `.env` tidak di-commit
- ✅ Eloquent ORM (SQL injection safe)
- ✅ Custom error pages

---

## 📄 License

Copyright © 2026 Ariel Maulidibillah. All rights reserved.

Source code ini dipublikasikan untuk keperluan showcase. Mohon tidak menggunakan konten pribadi (foto, CV, data diri) tanpa izin.