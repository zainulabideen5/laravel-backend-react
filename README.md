# Al-Fateem Academy: Backend and Admin Panel

Laravel backend for the Al-Fateem Academy website. It does two jobs:

1. **REST API** that the React frontend reads all of its content from
2. **Admin panel** where the academy manages that content without touching code

Frontend: [Al-Fateem-Academy-Project](https://github.com/zainulabideen5/Al-Fateem-Academy-Project)

## Admin panel

Login is handled by Laravel Jetstream. After signing in, admins can create, edit and delete:

| Section | What it controls |
|---|---|
| Home page | Hero title, technology description, totals and intro video |
| Courses | Course list, home page highlights and course detail pages |
| Projects | Portfolio projects and project detail pages |
| Services | Services offered |
| Client reviews | Testimonials |
| Charts | Data for the skills and stats charts |
| Information | About, privacy, terms and refund text |
| Footer | Address, email, phone, social links and footer credit |
| Contact | Messages sent from the website's contact form |

## API

Base path: `/api`

| Method | Endpoint | Returns |
|---|---|---|
| GET | `/homepage/title` | Hero title |
| GET | `/techhome` | Technology description |
| GET | `/totalhome` | Home page totals |
| GET | `/home/video` | Intro video |
| GET | `/coursehome` | Four featured courses |
| GET | `/courseall` | All courses |
| GET | `/coursedetails/{id}` | One course |
| GET | `/projecthome` | Three featured projects |
| GET | `/projectall` | All projects |
| GET | `/projectdetails/{id}` | One project |
| GET | `/services` | Services |
| GET | `/clientreview` | Client reviews |
| GET | `/chartdata` | Chart data |
| GET | `/information` | About, privacy, terms, refund |
| GET | `/footerdata` | Footer content |
| POST | `/contactsend` | Saves a contact form message |

## Tech stack

- PHP 8, Laravel 9
- Laravel Jetstream with Livewire for authentication
- Laravel Sanctum
- Intervention Image
- MySQL
- Bootstrap admin theme

## Getting started

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
```

Set your database details in `.env`, then:

```bash
php artisan migrate
npm run build
php artisan serve
```

The admin panel is at `http://localhost:8000/dashboard` and the API at `http://localhost:8000/api`.

---

Built by [Zain Ul Abideen](https://github.com/zainulabideen5)
