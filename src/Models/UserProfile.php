<?php

namespace AlvariumDigital\PermissionsMakr\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserProfile extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = false;
    public $incrementing = false;
    protected $table = 'user_profiles';
    protected $primaryKey = 'id';

    protected $fillable = ['user_id', 'profile_id'];

    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class, 'profile_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(config('permissions_makr.user_model'), 'user_id', app()->make(config('permissions_makr.user_model'))->getKeyName());
    }
}
