<?php

declare(strict_types=1);

namespace App\Http\ViewComposers;

use App\Models\User;
use Illuminate\View\View;

class NavigationComposer
{
    public function compose(View $view): View
    {
        if (auth()->guest()) {
            return $view;
        }

        /** @var User $user */
        $user = auth()->user();

        return $view->with([
            'unpublishedListingCount' => $user->listings->where('live', false)->count(),
            'publishedListingCount' => $user->listings->where('live', true)->count(),
        ]);
    }
}
