<?php

declare(strict_types=1);

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Region;
use Illuminate\View\View;
use SEO;
use function compact;

class CategoryController extends Controller
{
    public function index(): View
    {
        SEO::setTitle('Category');

        $categories = Category::withListings()->get()->toTree();

        return view('category.index', compact('categories'));
    }
}
