# Dallëndyshja LMS

**A full-stack Learning Management System for schools — built with Laravel, React (TypeScript), and PostgreSQL.**

Dallëndyshja is a multi-role LMS that connects admins, instructors, students, and parents in one platform. It handles course management, lesson delivery, assignment grading, and parent-side progress tracking — with role-based access control (RBAC) and JWT authentication securing every layer.

Started as a team project under Agile/Scrum and now developed and maintained solo — covering the database schema, Laravel REST API, and React + TypeScript frontend end to end.

---

## Why it's interesting

- **Four distinct user roles** (Admin, Instructor, Student, Parent) — each with its own permissions, dashboard, and workflow, enforced through RBAC.
- **Full-stack ownership** — REST APIs in Laravel + PostgreSQL on the backend, a component-driven React frontend with TypeScript interfaces for every API response.
- **Real school workflow** — course catalog, assignment submission portal, grading, and a dedicated parent tracking dashboard.
- **Led and continued** — took over as project lead and kept the project moving through sprints after the original team dispersed, tracked in Jira with a shared Git workflow.

---

## Tech stack

| Layer | Stack |
|---|---|
| Frontend | React.js, TypeScript, Tailwind CSS |
| Backend | PHP Laravel, REST APIs |
| Database | PostgreSQL |
| Auth & security | JWT, RBAC, password hashing, input validation |
| Tooling | Git, GitHub, Jira, Agile/Scrum |

---

## Architecture

Three-tier client–server architecture:

- **Frontend (React + TypeScript)** — typed components and `interface` definitions for API responses, reducing runtime errors.
- **Backend (Laravel)** — modular REST API with role-aware endpoints for courses, lessons, assignments, and users.
- **Database (PostgreSQL)** — relational schema for users, roles, courses, lessons, enrollments, and submissions.

---

## Running locally

**Prerequisites:** PHP 8.2+, Composer, Node.js + npm, PostgreSQL

**Backend**
```bash
composer install
cp .env.example .env
php artisan key:generate
# set DB_DATABASE, DB_USERNAME, DB_PASSWORD in .env
php artisan migrate
php artisan serve
```

**Frontend**
```bash
cd frontend
npm install
npm start
```