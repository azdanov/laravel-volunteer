<?php

declare(strict_types=1);

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreListingShareRequest;
use App\Mail\ListingShared;
use App\Models\Listing;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Mail;
use SEO;
use function collect;

class ShareListingController extends Controller
{
    public const MAX_EMAIL = 5;

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Listing $listing): View
    {
        SEO::setTitle('Share');

        return view('share_listing.show', [
            'listing' => $listing,
            'max_email' => $this::MAX_EMAIL,
        ]);
    }

    public function store(StoreListingShareRequest $request, Listing $listing): RedirectResponse
    {
        collect($request->emails)
            ->filter()
            ->each(
                static function ($email) use ($listing, $request): void {
                    Mail::to($email)
                        ->queue(
                            new ListingShared($listing, $request->user(), $email, $request->message)
                        );
                }
            );

        return redirect()
            ->route(
                'region_category_listing.show',
                [
                    'region' => $listing->region,
                    'category' => $listing->category,
                    'listing' => $listing,
                ]
            )
            ->with('success', 'Listing has been shared.');
    }
}
