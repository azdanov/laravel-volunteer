<?php

/** @noinspection PhpStaticAsDynamicMethodCallInspection */

declare(strict_types=1);

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreListingFormRequest;
use App\Models\Category;
use App\Models\Listing;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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

        return view('listing.show', compact('listings', 'category'));
    }

    public function create(): View
    {
        return view('listing.create');
    }

    public function store(StoreListingFormRequest $request): RedirectResponse
    {
        $listing = new Listing();
        $listing->title = $request->title;
        $listing->body = $request->body;
        $listing->category_id = $request->category_id;
        $listing->region_id = $request->region_id;
        $listing->featured = $request->featured === 'on';
        $listing->user()->associate($request->user());

        $listing->save();

        return redirect()->route('listing.edit', compact('listing'));
    }

    /**
     * @throws AuthorizationException
     */
    public function edit(Listing $listing): View
    {
        $this->authorize('edit', $listing);

        return view('listing.edit', compact('listing'));
    }

    /**
     * @throws AuthorizationException
     */
    public function update(StoreListingFormRequest $request, Listing $listing): RedirectResponse
    {
        $this->authorize('update', $listing);

        $listing->title = $request->title;
        $listing->body = $request->body;
        $listing->category_id = $request->category_id;
        $listing->region_id = $request->region_id;
        $listing->featured = $request->featured === 'on';

        $listing->save();

        return back()->with('success', 'Listing has been updated!');
    }
}
