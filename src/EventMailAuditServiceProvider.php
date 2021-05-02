<?php

namespace MailAudit;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventMailAuditServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Illuminate\Mail\Events\MessageSending' => [
            'MailAudit\Listeners\EmailSending',
        ],
        'Illuminate\Mail\Events\MessageSent' => [
            'MailAudit\Listeners\EmailSent',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
