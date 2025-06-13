# Symfony 7 + Docker + Nginx + MariaDB Starter Template

This repository provides a modern, production-ready template to kickstart your Symfony 7 projects with Docker, Nginx, and MariaDB. It is designed to be cloned or used as a GitHub template for new projects, ensuring a fast and reliable setup for development teams.

## Features

- Symfony 7 pre-configured
- Dockerized environment for easy local development
- Nginx as the web server
- PHP 8.2 (FPM)
- MariaDB as the database
- Doctrine ORM and Migrations ready
- Modern, styled welcome page with database connection check
- Composer and Symfony Flex support

## Getting Started

### 1. Clone or Use as Template

- Click "Use this template" on GitHub or clone the repository:
  ```bash
  git clone https://github.com/your-username/your-repo.git
  cd your-repo
  ```

### 2. Start the Environment

- Build and start the containers:
  ```bash
  docker compose up --build
  ```
- The application will be available at [http://localhost:8080](http://localhost:8080)

### 3. Database Access

- MariaDB is exposed on port 3307 (host) → 3306 (container).
- Default credentials:
  - Host: `mariadb`
  - Port: `3306` (use `3307` from your host)
  - Database: `symfony`
  - User: `symfony`
  - Password: `symfony`

### 4. Composer

- To install or update dependencies inside the container:
  ```bash
  docker compose exec app composer install
  docker compose exec app composer update
  ```

### 5. Customization

- Edit the `templates/default/index.html.twig` file for your own welcome page.
- Add your own bundles, routes, and code as needed.

## Folder Structure

- `src/` — Symfony source code
- `config/` — Symfony configuration
- `templates/` — Twig templates
- `docker/` — Docker-related files (Nginx config)
- `docker-compose.yml` — Docker Compose setup
- `Dockerfile` — PHP-FPM image build

## Useful Commands

- Run Symfony console:
  ```bash
  docker compose exec app php bin/console
  ```
- Run Doctrine migrations:
  ```bash
  docker compose exec app php bin/console doctrine:migrations:migrate
  ```

## License

This template is open source and available under the GNU General Public License v3.0 License.

---

Happy coding! 🚀

