# Beekeeper API

[![Build documentation](https://github.com/BEEKINI/beekeeper-api/actions/workflows/build-docs.yml/badge.svg)](https://github.com/BEEKINI/beekeeper-api/actions/workflows/build-docs.yml)

This projet is a study project to learn how to create an API with Laravel
and synchronize it with a front-end application.

> For more information, please refer to the [documentation](https://beekini.github.io/beekeeper-api/starter-topic.html).

## Getting started

### Requirements

- Docker
- Composer

## Installation for production

To install the project, you need to follow these steps:

1. Clone the repository
2. Copy the `.env.example` file using `cp .env.example .env`
3. Install the dependencies with `composer install`
4. Generate the application key with `php artisan key:generate`
5. Start the project with `docker-compose up -d`
6. Run the migrations with `docker-compose exec app php artisan migrate`
7. Run the seeders with `docker-compose exec app php artisan db:seed`
8. Access the application at `http://localhost:8080`
9. enjoy the application 

## Installation for development

To install the project for development, you need to follow these steps:

1. Clone the repository
2. Copy the `.env.example` file using `cp .env.example .env`
3. Install the dependencies with `composer install`
4. Generate the application key with `php artisan key:generate`
5. Start the project with `./vendor/bin/sail up -d`
6. Run the migrations with `./vendor/bin/sail artisan migrate`
7. Run the seeders with `./vendor/bin/sail artisan db:seed`
8. Access the application at `http://localhost:8080`
9. enjoy the development
