<?php

declare(strict_types=1);

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use function compact;

class ViewedListingController extends Controller
{
    public const LIMIT = 3;

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Request $request): View
    {
        /** @var User $user */
        $user = $request->user();

        $listings = $user
            ->viewedListings()
            ->with(['region', 'user', 'category'])
            ->orderByPivot('created_at', 'desc')
            ->isLive()
            ->take(self::LIMIT)
            ->get();

        return view('user.listing.viewed.index', ['listings' => $listings, 'limit' => self::LIMIT]);
    }
}
