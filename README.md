## Application Tracking System for HR's

An applicant tracking system (ATS) is a software application that enables the electronic handling of recruitment and hiring needs. An ATS is very similar to customer relationship management (CRM) systems, but are designed for recruitment tracking purposes. In many cases they filter applications automatically based on given criteria such as keywords, skills, former employers, years of experience and schools attended.

## Deployment

Set DB Credentials on .env file, you can copy the env example file and edit.

```php
composer install
```

```php
php artisan migrate --seed
```

```php
php artisan key:generate
```

```php
php artisan storage:link
```

```php
npm install
```

```php
npm run dev
```

Add your domain name on .env file for Sanctum API

```php
SANCTUM_STATEFUL_DOMAINS=yourdomain.com
```

## Default Credentials

```php
Username: admin@admin.com
Password: password
```
