<div class="panel-outer">
    <div class="panel-inner">
        <div class="panel-heading">
            <span class="panel-heading-text">Featured</span>
        </div>
        <div class="flex flex-wrap px-4 py-3">
            @foreach ($featured as $listing)
                <div class="w-1/2 my-2 md:w-1/5 inline-flex flex-col">
                    <a class="font-semibold text-left text-green-darker no-underline"
                       href="{{ route('region_category_listing.show', ['region' => $listing->region, 'category' => $listing->category, 'listing' => $listing]) }}">
                        {{ $listing->title }}
                    </a>
                    <div>
                        <small class="text-xs text-green-darker mt-1">
                            in {{ $listing->category->name }},</small>
                        <small class="text-xs text-green-darker mt-1">
                             {{ $listing->region->name }}</small>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
