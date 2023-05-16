# Laravel Project

This is a Laravel project that utilizes Docker for easy setup and deployment. It interacts with public APIs using a token provided in the .env file, implements protected routes with authentication, and supports Google login.

## Docker Setup

To run the Laravel project using Docker, follow these steps:

1. Make sure you have Docker and Docker Compose installed on your machine.
2. Clone this repository to your local environment.
3. Create a `.env` file in the root directory of the project and set the necessary environment variables. Refer to the `.env.example` file for the required variables.
4. Open the `Dockerfile` and review the dependencies and configurations. Adjust them if needed to fit your project requirements.
5. Build the Docker image by running the command `docker build -t laravel-app .` in the project's root directory.
6. Run the containers using the command `docker-compose up -d`.
7. Access the Laravel application by visiting `http://localhost:8000` in your web browser.

## Project Overview

The Laravel project provides the following functionality:

- Interaction with public APIs: The project utilizes the provided token from the `.env` file to make requests to public APIs. You can customize the API endpoints and logic according to your needs.
- Protected routes with authentication: Certain routes in the project are protected and require authentication. Users can register, log in, and log out. Additionally, you can leverage the Google login feature for a seamless authentication experience.
- Google login: The project supports logging in via Google. Configure the necessary environment variables in the `.env` file and set up the appropriate Google API credentials to enable this feature.

## Additional Information

For more details and instructions on using Laravel, refer to the official Laravel documentation: [https://laravel.com/docs](https://laravel.com/docs).