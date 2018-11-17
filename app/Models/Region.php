<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Kalnoy\Nestedset\Collection;
use Kalnoy\Nestedset\NodeTrait;

/**
 * App\Models\Region.
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $_lft
 * @property int $_rgt
 * @property int|null $parent_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Collection|Region[] $children
 * @property Region|null $parent
 * @property bool $usable
 * @method static Builder|Region d()
 * @method static Builder|Region query()
 * @method static Builder|Region newQuery()
 * @method static Builder|Region newModelQuery()
 * @method static Builder|Region whereCreatedAt($value)
 * @method static Builder|Region whereId($value)
 * @method static Builder|Region whereLft($value)
 * @method static Builder|Region whereName($value)
 * @method static Builder|Region whereParentId($value)
 * @method static Builder|Region whereRgt($value)
 * @method static Builder|Region whereSlug($value)
 * @method static Builder|Region whereUpdatedAt($value)
 * @method static Builder|Region whereUsable($value)
 */
class Region extends Model
{
    use NodeTrait;

    /** @var string[] */
    protected $fillable = ['name', 'slug'];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
