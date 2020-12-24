<?php

namespace Modules\Contact\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\User\Entities\User;

class Ticket extends Model
{


    protected $fillable = ['subject', 'message', 'status', 'user_id', 'priority_id', 'department_id', 'parent_id'];

    protected $table = 'tickets';


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function priority(): BelongsTo
    {
        return $this->belongsTo(Priority::class, 'priority_id', 'id');
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Ticket::class, 'parent_id', 'id');
    }

    /**
     * COMMENT : this scope filter the ticket's children that is active
     * ATTENTION : if you want to filter parent you can set filter in controller
     * @param Builder $query
     * @param null $child_active
     * @return Builder
     */
    public function scopeParents(Builder $query, $child_active = null): Builder
    {
        if (!is_null($child_active))
            return $query->whereNull('parent_id')
                ->with(['children' => function ($query) use ($child_active) {
                    $query->where('is_active', $child_active);
                }]);
        return $query->whereNull('parent_id')->with('children');
    }
}
