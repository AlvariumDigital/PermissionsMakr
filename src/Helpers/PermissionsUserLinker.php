<?php


namespace AlvariumDigital\PermissionsMakr\Helpers;

use AlvariumDigital\PermissionsMakr\Models\UserProfile;

/**
 * Trait PermissionsUserLinker
 * ***************************************************************
 * This trait class offers some helper functions to let you link
 * users to profiles, you can use it on the user's model class
 *
 * Important:
 * ----------
 *   To use this trait you need to add the
 *   PermissionsMakr trait to your user model before using
 *   PermissionsUserLinker
 * ***************************************************************
 *
 * @package AlvariumDigital\PermissionsMakr\Helpers
 */
trait PermissionsUserLinker
{

    /**
     * Link a user to a profile
     *
     * @param int $profile
     */
    function linkProfile(int $profile): void
    {
        if ($this->profiles->where('id', $profile)->count() == 0) {
            UserProfile::create(['user_id' => $this->{$this->getKeyName()}, 'profile_id' => $profile]);
        }
    }

    /**
     * Link a user to a list of profiles
     *
     * @param array $profiles
     */
    function linkProfiles(array $profiles): void
    {
        $data = [];
        foreach ($profiles as $profile) {
            if ($this->profiles->where('id', $profile)->count() == 0) {
                array_push($data, ['user_id' => $this->{$this->getKeyName()}, 'profile_id' => $profile]);
            }
        }
        if (sizeof($data)) {
            UserProfile::insert($data);
        }
    }

}
