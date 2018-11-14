<?php

/** @noinspection PhpStaticAsDynamicMethodCallInspection */

declare(strict_types=1);

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Listing;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\View\View;
use function compact;

class RegionCategoryListingController extends Controller
{
    public function index(Region $region, Category $category): View
    {
        $listings = Listing::with(['user', 'region'])
            ->isLive()
            ->inRegion($region)
            ->fromCategory($category)
            ->latestFirst()
            ->paginate(config('volunteer.default.listing_pagination'));

        return view('region_category_listing.index', compact('listings', 'category', 'region'));
    }

    public function show(
        Request $request,
        Region $region,
        Category $category,
        Listing $listing
    ): View {
        abort_if(!$listing->live, 404);

        return view('region_category_listing.show', compact('listing', 'category', 'region'));
    }
}
