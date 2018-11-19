<?php

declare(strict_types=1);

namespace App\Mail;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use function sprintf;

class ListingShared extends Mailable implements ShouldQueue
{
    use Queueable;
    use SerializesModels;

    /** @var Listing */
    private $listing;
    /** @var User */
    private $sender;
    /** @var string */
    private $recipient;
    /** @var string */
    private $body;

    /**
     * Create a new message instance.
     */
    public function __construct(Listing $listing, User $sender, string $recipient, string $body)
    {
        $this->listing = $listing;
        $this->sender = $sender;
        $this->recipient = $recipient;
        $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = '%s shared %s with you';

        return $this
            ->from(config('volunteer.default.email'))
            ->markdown('emails.listing.share', [
                'listing' => $this->listing,
                'recipient' => $this->recipient,
                'sender' => $this->sender,
                'body' => $this->body,
            ])
            ->subject(sprintf($subject, $this->sender->name, $this->listing->title))
            ->from(config('volunteer.default.email'))
            ->replyTo($this->sender->email);
    }
}
