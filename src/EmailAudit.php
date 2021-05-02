<?php

namespace MailAudit;

use Illuminate\Database\Eloquent\Model;

class EmailAudit extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'message_id',
        'email_at',
        'from',
        'to',
        'bcc',
        'content',
        'subject',
        'status',
        'sent'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'from' => 'array',
        'to' => 'array',
        'bcc' => 'array'
    ];

    /**
     * @param $event
     * @return array
     */
    public static function parseEvent($event): array
    {
        $headers = $event->message->getHeaders();
        $data = [
            'email_at' => $headers->get('Date')->getDateTime()->format('Y-m-d H:i:s'),
            'subject' => $headers->get('Subject')->getValue(),
            'to' => [],
            'from' => [],
            'bcc' => [],
            'content' => $event->message->getBody()
        ];

        foreach ($headers->get('from')->getNameAddresses() as $email => $name) {
            $data['from'][] = [
                'name' => $name,
                'email' => $email
            ];
        }

        foreach ($headers->get('to')->getNameAddresses() as $email => $name) {
            $data['to'][] = [
                'name' => $name,
                'email' => $email
            ];
        }

        foreach ($headers->get('bcc')->getNameAddresses() as $email => $name) {
            $data['bcc'][] = [
                'name' => $name,
                'email' => $email
            ];
        }

        $data['message_id'] = md5(serialize($data));
        return $data;
    }
}
