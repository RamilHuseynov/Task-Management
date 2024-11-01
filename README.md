# Laravel Dynamic Task Management System

This project is a dynamic task management system built using Laravel. The system allows assigning tasks to users, setting deadlines, sending email notifications, and filtering tasks by date.

## Features

- **Task and User Models**: Models for `Task` and `User` are created to assign and manage tasks for users.
- **Task Assignment**: Assign specific tasks to users and set a deadline for each task.
- **Task Notification**: Send an email notification to the user when a task is created.
- **Status Change Notification**: When a user completes a task or changes its status, a notification is sent to the user who assigned the task.
- **Deadline Reminder**: Automatically send a reminder email to users one day before the task's due date.
- **Date-based Task Filtering**: Users can filter tasks based on specific date ranges.

## Requirements

- PHP > 8.0
- Laravel > 9.x
- Composer
- Database (MySQL, PostgreSQL, etc.)
- Local Server

## Installation

To set up this project locally, follow these steps:

1. Clone the repository:
   
   - git clone https://github.com/RamilHuseynov/Task-manager.git

2. Install dependencies:
   - composer install

3. Create an .env file by copying the example file:

4. Generate the application key:
   - php artisan key:generate

5. Configure your database settings in the .env file:
   - **DB_CONNECTION=mysql**
   - **DB_HOST=your_database_host**
   - **DB_PORT=your_database_port**
   - **DB_DATABASE=your_database_name**
   - **DB_USERNAME=your_database_username**
   - **DB_PASSWORD=your_database_password**

6. Run the migrations to set up the database tables:
   - php artisan migrate

7. Configure email settings in the .env file for email notifications:
   - **MAIL_MAILER=smtp**
   - **MAIL_HOST=your_mail_host**
   - **MAIL_PORT=your_mail_port**
   - **MAIL_USERNAME=your_mail_username**
   - **MAIL_PASSWORD=your_mail_password**
   - **MAIL_ENCRYPTION=your_mail_encryption**
   - **MAIL_FROM_ADDRESS="no-reply@example.com"**
   - **MAIL_FROM_NAME="${APP_NAME}"**
   

## Usages

- **Log in to manage tasks and users.**
- **Assign tasks, set deadlines, and update statuses.**
- **Filter tasks by date to check deadlines and history.**
- **Get reminders as deadlines approach.**


