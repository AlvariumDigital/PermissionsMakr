<?php

namespace AlvariumDigital\PermissionsMakr\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfileRole extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = false;
    public $incrementing = false;
    protected $table = 'profile_roles';
    protected $primaryKey = 'id';

    protected $fillable = ['profile_id', 'role_id'];

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class, 'profile_id', 'id');
    }
}
