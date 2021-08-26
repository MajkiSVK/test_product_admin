<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendNotificationToAdminMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * @var string
     */
    private $report;

    /**
     * Create a new message instance.
     *
     * @param string $subject
     * @param string $report
     * @return void
     */
    public function __construct(string $subject, string $report)
    {
        //
        $this->subject = $subject;
        $this->report = $report;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('test@testingmail.com', 'Test mail')
            ->subject($this->subject)
            ->view('notificationMail')
            ->with(['report' => $this->report]);
    }
}
