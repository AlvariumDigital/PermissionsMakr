<?php

namespace AlvariumDigital\PermissionsMakr\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = true;
    public $incrementing = true;
    protected $table = 'roles';
    protected $primaryKey = 'id';

    protected $fillable = ['code', 'name'];

    public function profiles(): BelongsToMany
    {
        return $this->belongsToMany(Profile::class, 'profile_roles', 'role_id', 'profile_id');
    }
}
