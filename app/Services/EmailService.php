<?php

namespace App\Services;
use App\Exception\Email\SendException;
use App\Models\Email;
use App\Enums\EmailStatus;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email as EmailMime;

class EmailService
{
    public function __construct(protected MailerInterface $mailer)
    {

    }

    public function sendQueuedEmails($email)
    {
            try {

            $meta = json_decode($email->meta, true);
            $emailMessage = (new EmailMime())
                ->from($meta['from'])
                ->to($meta['to'])
                ->subject($email->subject)
                ->text($email->text_body)
                ->html($email->html_body);

            $this->mailer->send($emailMessage);

            } catch (\Throwable) {
                throw new SendException();
            }
    }
    public function send(array $customer,string $email)
    {
        return true;
    }
}
