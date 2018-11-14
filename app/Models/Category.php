<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Kalnoy\Nestedset\Collection as NestedCollection;
use Kalnoy\Nestedset\NodeTrait;

/**
 * App\Models\Category.
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property bool $featured
 * @property int $_lft
 * @property int $_rgt
 * @property int|null $parent_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Category d()
 * @method static Builder|Category newModelQuery()
 * @method static Builder|Category newQuery()
 * @method static Builder|Category query()
 * @method static Builder|Category whereCreatedAt($value)
 * @method static Builder|Category whereFeatured($value)
 * @method static Builder|Category whereId($value)
 * @method static Builder|Category whereLft($value)
 * @method static Builder|Category whereName($value)
 * @method static Builder|Category whereParentId($value)
 * @method static Builder|Category whereRgt($value)
 * @method static Builder|Category whereSlug($value)
 * @method static Builder|Category whereUpdatedAt($value)
 * @method static Builder|Category withListingsInRegion(Region $region)
 * @method static Builder|Category withListings()
 * @property NestedCollection|Category[] $children
 * @property Category|null $parent
 * @property Collection|Listing[] $listings
 * @mixin \Eloquent
 */
class Category extends Model
{
    use NodeTrait;

    /** @var string[] */
    protected $fillable = ['name', 'slug'];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function listings(): HasMany
    {
        return $this->hasMany(Listing::class);
    }

    public function scopeWithListings(Builder $query): Builder
    {
        return $query->with([
            'listings' => static function (HasMany $listing): void {
                /** @var HasMany|Listing $listing */
                $listing->isLive();
            },
        ]);
    }

    public function scopeWithListingsInRegion(Builder $query, Region $region): Builder
    {
        return $query->with([
            'listings' => static function (HasMany $listing) use ($region): void {
                /** @var HasMany|Listing $listing */
                $listing->isLive()->inRegion($region);
            },
        ]);
    }

    public function listingsCount(): int
    {
        return $this->subCategoryListingsCount() + $this->categoryListingsCount();
    }

    private function categoryListingsCount(): int
    {
        return $this->listings->count();
    }

    private function subCategoryListingsCount(): int
    {
        return $this->children->map->listings->sum->count();
    }
}
