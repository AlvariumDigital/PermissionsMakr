<?php


namespace AlvariumDigital\PermissionsMakr\Helpers;

/**
 * Trait HasPermissions
 * ***************************************************************
 * This trait class can be used to check if a user has role(s)
 * or not, mainly used on the HasPermissionMiddleware class
 * ***************************************************************
 *
 * @package AlvariumDigital\PermissionsMakr\Helpers
 */
trait HasPermissions
{

    /**
     * Check if a user has a role or not
     *
     * @param mixed $user The user object
     * @param array $roles The role's code
     * @param string $type The search type
     *      <br># 'any': return true if at least one role exists on the user's roles list
     *      <br># 'all': return true if all roles exists on the user's roles list
     * @return bool
     */
    public function hasRole($user, array $roles, string $type = 'any'): bool
    {
        switch ($type) {
            case 'any':
                $result = (count(array_intersect($roles, $user->roles)) != 0);
                break;
            case 'all':
                $result = (count(array_intersect($roles, $user->roles)) === count($roles));
                break;
            default:
                $result = false;
        }
        return $result;
    }

}
