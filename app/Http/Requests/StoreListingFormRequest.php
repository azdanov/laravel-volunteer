<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreListingFormRequest extends FormRequest
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
            'title' => 'required|string|max:60',
            'body' => 'required|string|max:255',
            'category_id' => [
                'required',
                Rule::exists('categories', 'id')
                    ->where(static function (Builder $query): void {
                        $query->where('usable', true);
                    }),
            ],
            'region_id' => [
                'required',
                Rule::exists('regions', 'id')
                    ->where(static function (Builder $query): void {
                        $query->where('usable', true);
                    }),
            ],
            'featured' => 'sometimes|accepted',
        ];
    }
}
