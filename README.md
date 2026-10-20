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