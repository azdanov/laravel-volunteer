<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ListingPolicy
{
    use HandlesAuthorization;

    public function edit(User $user, Listing $listing): bool
    {
        return $this->access($user, $listing);
    }

    public function update(User $user, Listing $listing): bool
    {
        return $this->access($user, $listing);
    }

    public function destroy(User $user, Listing $listing): bool
    {
        return $this->access($user, $listing);
    }

    public function access(User $user, Listing $listing): bool
    {
        return $listing->ownedByUser($user);
    }
}
