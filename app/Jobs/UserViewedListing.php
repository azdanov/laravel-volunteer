<?php

declare(strict_types=1);

namespace App\Jobs;

use App\Models\Listing;
use App\Models\User;

class UserViewedListing
{
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
