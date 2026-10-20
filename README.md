# MicroStack Overflow

A Laravel-based question-and-answer application inspired by Stack Overflow.

## Features and Requirements

The project aims to support the following features:

- Oprette bruger.
- Redigering af bruger.
- Input af spørgsmål.
- Redigering af spørgsmål, hvis man selv har skrevet dem.
- Input af svar til spørgsmål.
- Redigering af svar til spørgsmål, hvis man selv har skrevet dem.
- Inputvalidering af alle felter inden lagring i databasen. Formularen skal bevare brugerens input, hvis valideringen fejler.
- Upvoting og downvoting af svar.
- Upload af medier.
- Administrationspanel til administration af brugere og indhold.

## Tech Stack

- **Backend:** Laravel 8
- **Language:** PHP 8.0
- **Database:** MySQL 8.0
- **Web server:** Apache
- **Development environment:** Docker Compose

## Prerequisites

Install the following tools before running the project:

- [Docker Desktop](https://www.docker.com/products/docker-desktop/)
- [Git](https://git-scm.com/)

Docker Desktop must be running before you start the application.

## Getting Started

### 1. Clone the repository

If you have not already cloned the project:

```bash
git clone <repository-url>
cd microStackOverflow
```

Replace `<repository-url>` with the URL of your Git repository.

If you already have the project locally, open a terminal in the project directory.

### 2. Configure environment variables

Make sure the Laravel `.env` file exists.

If it does not, create it from the example file:

```powershell
Copy-Item .env.example .env
```

Check that the database settings match `docker-compose.yml`:

```dotenv
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=msfdb
DB_USERNAME=msfuser
DB_PASSWORD=msf_local_password
```

These settings are for the Laravel container connecting to the MySQL container. Do not use port `3308` for `DB_PORT` inside Docker.

### 3. Build and start the containers

From the project root, run:

```powershell
docker compose up -d --build
```

This builds the application image and starts the application and database containers.

To check their status:

```powershell
docker compose ps
```

### 4. Install PHP dependencies

The Docker image installs Composer dependencies during the build. If dependencies need to be installed or updated, run:

```powershell
docker compose exec app composer install
```

### 5. Generate the Laravel application key

Check whether the application key is already configured:

```powershell
docker compose exec app php artisan key:generate
```

Run this when setting up a new environment. Avoid regenerating the key for an existing environment without understanding the consequences for encrypted data and sessions.

### 6. Run database migrations

Apply any pending database migrations:

```powershell
docker compose exec app php artisan migrate
```

If the project has seeders that you want to run, use:

```powershell
docker compose exec app php artisan db:seed
```

Only run seeders when you understand what data they create or modify.

### 7. Open the application

Visit:

**http://localhost:8002**

MySQL is exposed on port `3308` on the host machine for tools that connect from outside Docker.

## Development

The application service uses a bind mount from the project directory to `/var/www/html` inside the container. This means local source-code changes are reflected in the container without rebuilding the Docker image.

After changing PHP, Blade, or route files, refresh the browser and test the changes.

You normally do not need to run `docker compose up -d --build app` for ordinary source-code edits.

Rebuild the application image when you change the Dockerfile or need to rebuild image-installed dependencies:

```powershell
docker compose up -d --build app
```

### Useful commands

View application logs:

```powershell
docker compose logs -f app
```

View database logs:

```powershell
docker compose logs -f mysql
```

Open a shell in the application container:

```powershell
docker compose exec app bash
```

List registered Laravel routes:

```powershell
docker compose exec app php artisan route:list
```

Clear Laravel's cached configuration, routes, and views:

```powershell
docker compose exec app php artisan optimize:clear
```

Stop the containers:

```powershell
docker compose down
```

Starting them again does not require rebuilding the image:

```powershell
docker compose up -d
```

**Database note:** `docker compose down` preserves the named database volume. Do not use `docker compose down -v` unless you deliberately want to remove the database volume and its stored data.

## Project Structure

Important directories:

```text
app/
  Http/
    Controllers/
    Middleware/
  Models/

database/
  factories/
  migrations/
  seeders/

resources/
  views/

routes/
  web.php
```

- **Controllers** handle incoming requests and coordinate application logic.
- **Models** represent database entities and their relationships.
- **Middleware** handles request checks, including administrator access.
- **Views** contain the Blade templates used to render pages.
- **Migrations** define database schema changes.

## License

This project uses the Laravel framework, which is open-source software licensed under the [MIT License](https://opensource.org/licenses/MIT). Refer to the repository's own license file for the license applicable to this project.