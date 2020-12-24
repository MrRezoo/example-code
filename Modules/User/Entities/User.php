<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use Laravel\Passport\HasApiTokens;
use Modules\Contact\Entities\Ticket;

class User extends Model
{
    use HasApiTokens;

    protected $fillable = ['name', 'mobile', 'password'];

    protected $table = 'users';

    /**
     * ATTENTION : bcrypt password that you enter on field
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * ATTENTION : if you dont set password this method creating random password during user creating
     */
    protected static function boot()
    {
        parent::boot();

        self::creating(function (User $user) {
            if (!$user->password)
                $user->password = Str::random(8);
        });
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

}
