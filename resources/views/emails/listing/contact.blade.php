@component('mail::message')
# Hello {{ $listing->user->name }},

{{ $sender->name }} has sent you a message about __{{ $listing->title }}__ listing.

@component('mail::panel')
{!! nl2br(e($body)) !!}
@endcomponent


@component('mail::button', ['url' => route('region_category_listing.show', ['region' => $listing->region, 'category' => $listing->category, 'listing' => $listing])])
View Listing
@endcomponent

Thanks,<br>
Volunteer - {{ now()->year }}
@endcomponent
