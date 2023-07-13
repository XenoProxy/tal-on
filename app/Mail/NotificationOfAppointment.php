<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

use App\Models\Appointment;

class NotificationOfAppointment extends Mailable
{
    use Queueable, SerializesModels;

    protected $appointment;

    /**
     * Create a new message instance.
     */
    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Notification of Appointment',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.notification_of_appointment',
            with: [
                'number' => $this->appointment->id,
                'name' => $this->appointment->patient_name,
                'doctor' => $this->appointment->doctor->name,
                'office' => $this->appointment->doctor->office,
                'date' => $this->appointment->date,
                'time' => $this->appointment->time,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
