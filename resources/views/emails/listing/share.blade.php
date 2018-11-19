@component('mail::message')
# Hello {{ $recipient }},

{{ $sender->name }} has shared __{{ $listing->title }}__ listing with you.

@component('mail::panel')
{!! nl2br(e($body)) !!}
@endcomponent

@component('mail::button', ['url' => route('region_category_listing.show', ['region' => $listing->region, 'category' => $listing->category, 'listing' => $listing])])
View Listing
@endcomponent

Thanks,<br>
Volunteer - {{ now()->year }}
@endcomponent
