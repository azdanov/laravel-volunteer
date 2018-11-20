<?php

declare(strict_types=1);

namespace App\Jobs;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UserViewedListing implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /** @var User */
    public $user;
    /** @var Listing */
    public $listing;

    public function __construct(User $user, Listing $listing)
    {
        $this->user = $user;
        $this->listing = $listing;
    }

    public function handle(): void
    {
        $userViewed = $this->user->viewedListings;

        if ($userViewed->contains($this->listing)) {
            $userViewed->where('id', $this->listing->id)->first()->pivot->increment('count');
        } else {
            $this->user->viewedListings()->attach($this->listing, ['count' => 1]);
        }
    }
}
