<?php

namespace MailAudit;

use Illuminate\Support\ServiceProvider;

class MailAuditServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Illuminate\Mail\Events\MessageSending' => [
            'App\Listeners\EmailSending',
        ],
        'Illuminate\Mail\Events\MessageSent' => [
            'App\Listeners\EmailSent',
        ],
    ];
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }
}
