<?php

namespace Modules\Contact\Entities;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{

    protected $fillable = ['name'];

    protected $table = 'department';

    public function usesTimestamps(): bool
    {
        return false;
    }

}
