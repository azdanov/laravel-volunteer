<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\Orderable;
use App\Traits\PivotOrderable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use function array_merge;

/**
 * App\Models\Listing.
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
 * @property Category $category
 * @property Region $region
 * @property User $user
 * @property Collection|User[] $favorites
 * @property-read Collection|User[] $viewedUsers
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
 * @method static bool|null forceDelete()
 * @method static Builder|Listing fromCategory(Category $category)
 * @method static Builder|Listing inRegion(Region $region)
 * @method static Builder|Listing isDraft()
 * @method static Builder|Listing isLive()
 * @method static Builder|Listing latestFirst()
 * @method static Builder|Listing onlyTrashed()
 * @method static bool|null restore()
 * @method static Builder|Listing withTrashed()
 * @method static Builder|Listing withoutTrashed()
 * @method static Builder|Listing orderByPivot($column = 'created_at', $order = 'desc')
 * @mixin \Eloquent
 */
class Listing extends Model
{
    use SoftDeletes;
    use Orderable;
    use PivotOrderable;

    public function scopeIsLive(Builder $query): Builder
    {
        return $query->where('live', true);
    }

    public function scopeIsDraft(Builder $query): Builder
    {
        return $query->where('live', false);
    }

    public function scopeFromCategory(Builder $query, Category $category): Builder
    {
        return $query->whereIn(
            'category_id',
            array_merge([$category->id], $category->descendants()->pluck('id')->toArray())
        );
    }

    public function scopeInRegion(Builder $query, Region $region): Builder
    {
        return $query->whereIn(
            'region_id',
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

    public function live(): bool
    {
        return $this->live;
    }

    public function cost(): int
    {
        return $this->featured ? (int) config('volunteer.default.cost') : 0;
    }

    public function favorites(): MorphToMany
    {
        return $this->morphToMany(User::class, 'favorite');
    }

    public function favoritedBy(User $user): bool
    {
        return $this->favorites->contains($user);
    }

    public function favoritedTime(): string
    {
        return $this->pivot->created_at->diffForHumans();
    }

    public function viewedUsers(): BelongsToMany
    {
        return $this
            ->belongsToMany(User::class, 'user_listing_views')
            ->withTimestamps()
            ->withPivot(['count']);
    }

    public function views(): int
    {
        return $this->viewedUsers->sum('pivot.count');
    }

    public function ownedByUser(User $user): bool
    {
        return $this->user->id === $user->id;
    }
}
