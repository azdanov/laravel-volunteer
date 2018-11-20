<?php

declare(strict_types=1);

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Models\User;
use Illuminate\View\View;
use SEO;
use function compact;

class PublishedListingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(): View
    {
        SEO::setTitle('Published');

        /** @var User $user */
        $user = auth()->user();

        $listings = $user
            ->listings()
            ->with(['user', 'region', 'category'])
            ->isLive()
            ->latestFirst()
            ->paginate(config('volunteer.default.listing_pagination'));

        return view('user.listing.published.index', compact('listings'));
    }
}
