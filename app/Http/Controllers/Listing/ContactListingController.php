<?php

declare(strict_types=1);

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreListingContactFormRequest;
use App\Mail\ListingContactCreated;
use App\Mail\ListingShared;
use App\Models\Category;
use App\Models\Listing;
use App\Models\Region;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use function sprintf;

class ContactListingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store(
        StoreListingContactFormRequest $request,
        Region $region,
        Category $category,
        Listing $listing
    ): RedirectResponse {
        Mail::to($listing->user)
            ->queue(new ListingContactCreated($listing, $request->user(), $request->message));

        return back()->with('success', sprintf('The email was sent to %s!', $listing->user->name));
    }
}
