<?php

declare(strict_types=1);

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait PivotOrderable
{
    public function scopeOrderByPivot(
        Builder $query,
        string $column = 'created_at',
        string $order = 'desc'
    ): Builder {
        return $query->orderBy('pivot_' . $column, $order);
    }
}
