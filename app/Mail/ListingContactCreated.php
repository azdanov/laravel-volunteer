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

final class ListingContactCreated extends Mailable implements ShouldQueue
{
    use Queueable;
    use SerializesModels;

    /** @var Listing */
    public $listing;
    /** @var User */
    public $sender;
    /** @var string */
    public $message;

    public function __construct(Listing $listing, User $sender, string $message)
    {
        $this->listing = $listing;
        $this->sender = $sender;
        $this->message = $message;
    }

    public function build(): self
    {
        $subject = '%s sent a message about %s';

        return $this
            ->view(
                'email.listing.contact.message',
                [
                    'listing' => $this->listing,
                    'sender' => $this->sender,
                    'body' => $this->message,
                ]
            )
            ->subject(sprintf($subject, $this->sender->name, $this->listing->title))
            ->from(config('volunteer.default.email'))
            ->replyTo($this->sender->email);
    }
}
