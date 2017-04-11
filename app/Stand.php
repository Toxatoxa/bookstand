<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stand extends Model
{

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'world_event_id',
        'company_id',
        'updated_at',
        'created_at',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
