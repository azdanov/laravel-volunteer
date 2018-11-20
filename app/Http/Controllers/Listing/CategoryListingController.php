<?php

/** @noinspection PhpStaticAsDynamicMethodCallInspection */

declare(strict_types=1);

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Listing;
use App\Models\Region;
use Illuminate\View\View;
use SEO;
use function compact;

class CategoryListingController extends Controller
{
    public function show(Category $category): View
    {
        SEO::setTitle($category->name);

        $listings = Listing::isLive()
            ->fromCategory($category)
            ->latestFirst()
            ->paginate(config('volunteer.default.listing_pagination'));

        return view('listing.show', compact('listings', 'category'));
    }
}
