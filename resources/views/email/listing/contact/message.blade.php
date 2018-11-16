Hello {{ $listing->user->name }}, <br><br>

{{ $sender->name }} has sent you a message about <a
    href="{{ route('region_category_listing.show', ['region' => $listing->region, 'category' => $listing->category, 'listing' => $listing]) }}">
    {{ $listing->title }}
</a>.

<br>
<br>
---
{!! nl2br(e($body)) !!}
---
<br>
<br>

Volunteer - {{ now()->year }}
