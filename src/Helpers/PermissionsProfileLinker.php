<?php


namespace AlvariumDigital\PermissionsMakr\Helpers;

use AlvariumDigital\PermissionsMakr\Models\ProfileRole;

/**
 * Trait PermissionsProfileLinker
 * ***************************************************************
 * This trait class offers some helper functions to let you link
 * profiles to roles, you can use it on the profile's model class
 * ***************************************************************
 *
 * @package AlvariumDigital\PermissionsMakr\Helpers
 */
trait PermissionsProfileLinker
{
    /**
     * Link a profile to a role
     *
     * @param int $role
     */
    function linkRole(int $role): void
    {
        if ($this->roles->where('id', $role)->count() == 0) {
            ProfileRole::create(['profile_id' => $this->id, 'role_id' => $role]);
        }
    }

    /**
     * Link a profile to a list of roles
     *
     * @param array $roles
     */
    function linkRoles(array $roles): void
    {
        $data = [];
        foreach ($roles as $role) {
            if ($this->roles->where('id', $role)->count() == 0) {
                array_push($data, ['profile_id' => $this->id, 'role_id' => $role]);
            }
        }
        if (sizeof($data)) {
            ProfileRole::insert($data);
        }
    }

}
