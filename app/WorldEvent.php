<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class WorldEvent extends Model
{

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at',
        'created_at',
    ];

    public function stands()
    {
        return $this->hasMany(Stand::class);
    }

    public function scopeToday($query)
    {
        $today = Carbon::today();
        return $query->where('start_at', '<=', $today)
            ->where('finish_at', '>=', $today);
    }
}
