<?php


namespace AlvariumDigital\PermissionsMakr\Helpers;

use AlvariumDigital\PermissionsMakr\Models\Profile;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Trait PermissionsMakr
 * ***************************************************************
 * This trait class can be used on the main User model class
 * to add some relations and other utilities
 * ***************************************************************
 *
 * @package AlvariumDigital\PermissionsMakr\Helpers
 */
trait PermissionsMakr
{

    /**
     * Profiles relation
     *
     * @return BelongsToMany
     */
    public function profiles(): BelongsToMany
    {
        return $this->belongsToMany(Profile::class, 'user_profiles', 'user_id', 'profile_id');
    }

    /**
     * Roles list (contains only roles "code" field)
     *
     * @return array
     */
    public function getRolesAttribute(): array
    {
        return array_unique($this->profiles->pluck('roles')->flatten()->pluck('code')->toArray());
    }

}
