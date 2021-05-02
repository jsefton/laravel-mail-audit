<?php

namespace MailAudit\Listeners;

use MailAudit\EmailAudit;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EmailSending
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $data = EmailAudit::parseEvent($event);
        $data['status'] = 'sending';
        $data['sent'] = 0;
        EmailAudit::updateOrCreate(['message_id' => $data['message_id']], $data);
    }
}
