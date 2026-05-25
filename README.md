# 🎓 School Management System

A web-based School Management System built using **HTML, CSS, and Pure PHP**, designed to simplify school administration processes such as student management, teacher management, authentication, attendance tracking, and academic records handling.

This project follows a structured backend architecture using Pure PHP while maintaining a clean and responsive frontend interface.

---

## 🚀 Features

### 🔐 Authentication System
- User Registration
- User Login
- Secure Password Hashing
- Session Management
- Logout Functionality
- Email Verification using PHPMailer
- Protected Routes

### 👨‍🎓 Student Management
- Add Students
- Update Student Information
- Delete Students
- View Student Records

### 👨‍🏫 Teacher Management
- Add Teachers
- Manage Teacher Records
- Update Teacher Information

### 📚 Course Management
- Create Courses
- Manage Course Records

### 📊 Results Management
- Add Student Results
- View Academic Performance

### 📅 Attendance Tracking
- Record Student Attendance
- Attendance Monitoring System

### 📧 Email Services
- PHPMailer Integration
- Email Verification Workflow
- Account Confirmation Links

### 🎨 Frontend
- Responsive UI
- Custom HTML & CSS Design
- Clean Dashboard Layout

---

## 🛠️ Tech Stack

### Frontend
- HTML5
- CSS3
- JavaScript

### Backend
- Pure PHP
- PHPMailer

### Database
- MySQL

### Server Environment
- Apache / XAMPP

---

## 📂 Project Structure

```
school-management/
│
├── admin/
├── auth/
├── assets/
│   ├── css/
│   ├── js/
│   ├── images/
│
├── config/
├── database/
├── functions/
├── handlers/
├── includes/
├── logs/
├── student/
├── teacher/
├── uploads/
│
├── vendor/
├── index.php
├── composer.json
├── .env
└── README.md
```

---

## ⚙️ Installation

### 1. Clone Repository

```bash
git clone https://github.com/yourusername/school-management.git
```

### 2. Navigate into Project

```bash
cd school-management
```

### 3. Install Dependencies

```bash
composer install
```

### 4. Configure Environment

Update your database credentials inside:

```
config/
```

Configure PHPMailer credentials:

```
.env
```

Example:

```env
MAIL_HOST=smtp.gmail.com
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_PORT=587
```

### 5. Import Database

Import the SQL file into MySQL.

### 6. Run Server

Move project into:

```
htdocs/
```

Then start:

- Apache
- MySQL

Open:

```
http://localhost/school-management
```

---

## 🔒 Security Features

- Password Hashing (`password_hash()`)
- Prepared Statements
- Session Authentication
- Email Verification Tokens
- Protected Pages
- Environment Variable Support

---

## 📸 Screenshots

Add screenshots of:

- Login Page
- Registration Page
- Dashboard
- Student Management
- Teacher Management

---

## 📌 Future Improvements

- Role-Based Access Control
- Notification System
- Student Report Generation
- File Upload Validation Improvements
- API Integration
- Dark Mode

---

## 👨‍💻 Author

Built by **David-Osas-bot**

GitHub: https://github.com/David-Osas-bot

---

## 📄 License

This project is for educational and portfolio purposes.
