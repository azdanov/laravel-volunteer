<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

/**
 * App\Models\User.
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property Collection|Listing[] $favoriteListings
 * @property-read Collection|Listing[] $viewedListings
 * @method static Builder|User query()
 * @method static Builder|User newQuery()
 * @method static Builder|User newModelQuery()
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereUpdatedAt($value)
 */
class User extends Authenticatable
{
    use Notifiable;

    /** @var string[] */
    protected $fillable = ['name', 'email', 'password'];

    /** @var string[] */
    protected $hidden = ['password', 'remember_token'];

    public function favoriteListings(): MorphToMany
    {
        return $this
            ->morphedByMany(Listing::class, 'favorite')
            ->withPivot(['created_at'])
            ->orderByPivot('created_at', 'desc');
    }

    public function viewedListings(): BelongsToMany
    {
        return $this
            ->belongsToMany(Listing::class, 'user_listing_views')
            ->withTimestamps()
            ->withPivot(['count', 'id']);
    }
}
