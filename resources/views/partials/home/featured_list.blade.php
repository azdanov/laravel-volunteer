<div class="bg-transparent text-left mb-3 lg:px-5">
    <div class="bg-grey-lighter shadow border border-t-0 text-white leading-none sm:rounded">
        <div class="bg-grey-light border border-r-0 border-l-0 px-4 py-2 sm:rounded-t">
            <a class="font-bold mr-6 text-green-darker no-underline"
               href="#">Featured</a>
        </div>
        <div class="flex justify-between flex-wrap px-4 py-3">
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
