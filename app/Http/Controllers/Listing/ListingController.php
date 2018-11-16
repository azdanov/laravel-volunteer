<?php

/** @noinspection PhpStaticAsDynamicMethodCallInspection */

declare(strict_types=1);

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\View\View;
use function compact;
use function view;

class ListingController extends Controller
{
    public function index(): View
    {
        /** @var User $user */
        $user = auth()->user();
        abort_if(!$user, Response::HTTP_NOT_FOUND);

        $listings = $user->favoriteListings()->with(['user', 'region', 'category'])->paginate(
            config('volunteer.default.listing_pagination')
        );

        return view('user.listing.favorite.index', compact('listings'));
    }

    public function show(Category $category): View
    {
        $listings = Listing::with(['user', 'region', 'category'])
            ->isLive()
            ->fromCategory($category)
            ->latestFirst()
            ->paginate(config('volunteer.default.listing_pagination'));

        return view('listings.show', compact('listings', 'category'));
    }
}
