<?php

declare(strict_types=1);

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Models\Region;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FavoriteListingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store(Request $request, Region $region, Listing $listing): RedirectResponse
    {
        /** @var User $user */
        $user = $request->user();

        $user->favoriteListings()->syncWithoutDetaching([$listing->id]);

        return back();
    }
}
