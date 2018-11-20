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

class ListingContactCreated extends Mailable implements ShouldQueue
{
    use Queueable;
    use SerializesModels;

    /** @var Listing */
    private $listing;
    /** @var User */
    private $sender;
    /** @var string */
    private $body;

    public function __construct(Listing $listing, User $sender, string $body)
    {
        $this->listing = $listing;
        $this->sender = $sender;
        $this->body = $body;
    }

    public function build(): self
    {
        $subject = '%s sent a message about %s';

        return $this
            ->markdown(
                'emails.listing.contact',
                [
                    'listing' => $this->listing,
                    'sender' => $this->sender,
                    'body' => $this->body,
                ]
            )
            ->subject(sprintf($subject, $this->sender->name, $this->listing->title))
            ->from(config('mail.from.address'))
            ->replyTo($this->sender->email);
    }
}
