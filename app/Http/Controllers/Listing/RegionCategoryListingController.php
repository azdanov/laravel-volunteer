<?php

/** @noinspection PhpStaticAsDynamicMethodCallInspection */

declare(strict_types=1);

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use App\Jobs\UserViewedListing;
use App\Models\Category;
use App\Models\Listing;
use App\Models\Region;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use function compact;

class RegionCategoryListingController extends Controller
{
    public function index(Region $region, Category $category): View
    {
        $listings = Listing::with(['user', 'region', 'category'])
            ->isLive()
            ->inRegion($region)
            ->fromCategory($category)
            ->latestFirst()
            ->paginate(config('volunteer.default.listing_pagination'));

        return view('region_category_listing.index', compact('listings', 'category', 'region'));
    }

    public function show(Request $request, Region $region, Category $category, Listing $listing): View
    {
        abort_unless($listing->live, Response::HTTP_NOT_FOUND);

        /** @var User $user */
        $user = $request->user();
        if ($user) {
            $this->dispatch(new UserViewedListing($user, $listing));
        }

        return view(
            'region_category_listing.show',
            compact('listing', 'category', 'region', 'user')
        );
    }
}
