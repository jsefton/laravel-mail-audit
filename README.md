# Laravel Mail Audit

Creates a log of all mail sending and sent in a database table to help with auditing mail.

Able to store and provide:

- Date
- To emails
- From emails
- BCC emails
- Subject
- Content of email
- Status
- Sent flag


## Installation


```bash
composer require jsefton/laravel-mail-audit
```

Run migrations to create 'email_audits' table:
```bash
php artisan migrate
```

This package will automatically register the event listeners and data will be inserted within the 'email_audits' table.

An eloquent model exists if you wish to query the data back out as: `MailAudit\EmailAudit`

Please note currently for Laravel 7+ until tested and verified in lower versions.
