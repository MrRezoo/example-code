<?php

namespace Modules\Contact\Entities;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{

    protected $fillable = ['name'];

    protected $table = 'priorities';

    public function usesTimestamps(): bool
    {
        return false;
    }


}
