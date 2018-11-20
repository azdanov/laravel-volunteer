<?php

declare(strict_types=1);

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Braintree\Gateway;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use SEO;
use function compact;
use function number_format;

class PaymentListingController extends Controller
{
    /** @var Gateway */
    private $gateway;

    public function __construct(Gateway $gateway)
    {
        $this->middleware(['auth']);
        $this->gateway = $gateway;
    }

    /**
     * @return mixed
     *
     * @throws AuthorizationException
     */
    public function show(Listing $listing)
    {
        SEO::setTitle('Pay ' . $listing->title);

        $this->authorize('access', $listing);

        if ($listing->paid) {
            return back()->with('error', 'Listing has already been paid.');
        }

        return view('payment_listing.show', compact('listing'));
    }

    /**
     * @return mixed
     *
     * @throws AuthorizationException
     */
    public function store(Request $request, Listing $listing)
    {
        $this->authorize('access', $listing);

        if ($listing->paid) {
            return back()->with('error', 'Listing has already been paid.');
        }

        if ($listing->featured === false) {
            return back()->with('error', 'Listing must be marked as featured to request payment.');
        }

        $nonce = $request->payment_nonce;

        if ($nonce === null) {
            return back()->with('error', 'Missing payment nonce.');
        }

        $result = $this->gateway->transaction()->sale([
            'amount' => number_format(config('volunteer.default.featured_price'), 2),
            'paymentMethodNonce' => $nonce,
            'options' => ['submitForSettlement' => true],
        ]);

        if ($result->success === false) {
            return back()->with('error', 'A problem has occurred during payment.');
        }

        $listing->live = true;
        $listing->paid = true;
        $listing->created_at = now();
        $listing->save();

        return redirect()->route(
            'region_category_listing.show',
            [
                'region' => $listing->region,
                'category' => $listing->category,
                'listing' => $listing,
            ]
        )->with('success', 'Awesome! Payment for your listing has been sent.');
    }

    /**
     * @throws AuthorizationException
     */
    public function update(Listing $listing): RedirectResponse
    {
        $this->authorize('access', $listing);

        if ($listing->featured) {
            return back()->with('error', 'A featured listing must be paid for');
        }

        $listing->live = true;
        $listing->created_at = now();
        $listing->save();

        return redirect()->route(
            'region_category_listing.show',
            [
                'region' => $listing->region,
                'category' => $listing->category,
                'listing' => $listing,
            ]
        )->with('success', 'Super! Your listing is added.');
    }
}
