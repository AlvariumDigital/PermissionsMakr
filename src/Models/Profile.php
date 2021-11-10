<?php

namespace AlvariumDigital\PermissionsMakr\Models;

use AlvariumDigital\PermissionsMakr\Helpers\PermissionsProfileLinker;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory, SoftDeletes, PermissionsProfileLinker;

    public $timestamps = true;
    public $incrementing = true;
    protected $table = 'profiles';
    protected $primaryKey = 'id';

    protected $fillable = ['code', 'name'];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'profile_roles', 'profile_id', 'role_id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(config('permissions_makr.user_model'), 'profile_id', 'user_id');
    }
}
