<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Listing;
use App\Models\Region;
use Illuminate\Contracts\View\View;
use function compact;

class HomeController extends Controller
{
    public function index(): View
    {
        $regions = Region::get()->toTree();
        $categories = Category::get()->toTree();
        $listings = Listing::with(['region', 'category'])->latest('updated_at')->limit(4)->get();

        return view('home.index', compact('regions', 'categories', 'listings'));
    }
}
