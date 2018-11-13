<?php

declare(strict_types=1);

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Region;
use Illuminate\View\View;
use function compact;

class CategoriesController extends Controller
{
    public function index(Region $region): View
    {
        $categories = Category::get()->toTree();

        return view('categories.index', compact('categories', 'region'));
    }
}
