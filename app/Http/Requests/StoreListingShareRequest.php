<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreListingShareRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return mixed[]
     */
    public function rules(): array
    {
        return [
            'emails.0' => 'required|email|distinct',
            'emails.*' => 'nullable|email|distinct',
            'message' => 'nullable|string|max:255',
        ];
    }

    /**
     * @return mixed[]
     */
    public function messages(): array
    {
        return [
            'emails.*.required' => 'At least one email is required.',
            'emails.*.email' => 'Enter a valid email address.',
            'emails.*.distinct' => 'All emails must be distinct.',
        ];
    }
}
