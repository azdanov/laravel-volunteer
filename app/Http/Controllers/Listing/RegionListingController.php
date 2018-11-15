<?php

declare(strict_types=1);

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Models\Region;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RegionListingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store(Region $region, Listing $listing): RedirectResponse
    {
        /** @var User $user */
        $user = auth()->user();

        $user->favoriteListings()->syncWithoutDetaching([$listing->id]);

        return back()->with('success', 'Listing added to favorites!');
    }

    public function destroy(Region $region, Listing $listing): RedirectResponse
    {
        /** @var User $user */
        $user = auth()->user();

        $user->favoriteListings()->detach($listing);

        return back()->with('success', 'Listing removed from favorites!');
    }
}
