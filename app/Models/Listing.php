<?php

declare(strict_types=1);

namespace App;

use App\Models\Category;
use App\Traits\Orderable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Carbon;
use function array_merge;

/**
 * App\Listing.
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property int $user_id
 * @property int $region_id
 * @property int $category_id
 * @property bool $live
 * @property bool $featured
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Listing newModelQuery()
 * @method static Builder|Listing newQuery()
 * @method static Builder|Listing query()
 * @method static Builder|Listing whereBody($value)
 * @method static Builder|Listing whereCategoryId($value)
 * @method static Builder|Listing whereCreatedAt($value)
 * @method static Builder|Listing whereDeletedAt($value)
 * @method static Builder|Listing whereFeatured($value)
 * @method static Builder|Listing whereId($value)
 * @method static Builder|Listing whereLive($value)
 * @method static Builder|Listing whereRegionId($value)
 * @method static Builder|Listing whereTitle($value)
 * @method static Builder|Listing whereUpdatedAt($value)
 * @method static Builder|Listing whereUserId($value)
 * @mixin \Eloquent
 */
class Listing extends Model
{
    use SoftDeletes;
    use Orderable;

    public function scopeIsLive(QueryBuilder $query): QueryBuilder
    {
        return $query->where('live', true);
    }

    public function scopeIsDraft(QueryBuilder $query): QueryBuilder
    {
        return $query->where('live', false);
    }

    public function scopeFromCategory(QueryBuilder $query, Category $category): QueryBuilder
    {
        return $query->where('category_id', $category->id);
    }

    public function scopeInRegion(QueryBuilder $query, Region $region): QueryBuilder
    {
        return $query->whereIn(
            'area_id',
            array_merge([$region->id], $region->descendants()->pluck('id')->toArray())
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function isLive(): bool
    {
        return $this->live;
    }

    public function cost(): int
    {
        return $this->featured ? (int) config('volunteer.default.cost') : 0;
    }
}
