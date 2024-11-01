<?php

namespace App\Mail;

use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TaskStatusUpdated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $task;
    public $updatedStatus;
    public function __construct(Task $task,$updatedStatus)
    {
        $this->task = $task;
        $this->updatedStatus = $updatedStatus;
    }

    public function build()
    {
        return $this->view('emails.task_status_updated')
                    ->subject("Task Status Updated: {$this->task->title}")
                    ->with([
                'taskTitle' => $this->task->title,
                'updatedStatus' => $this->updatedStatus,
                'deadline' => $this->task->deadline,
            ]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Task Status Updated',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.tasks.status_updated',
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
