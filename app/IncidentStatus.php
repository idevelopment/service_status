<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncidentStatus extends Model
{
    /**
     * Mass assign fields
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Hidden fields
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

    /**
     * Incidents -> Status relation.
     * s
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function issues()
    {
        return $this->belongsToMany('App\Incidents');
    }
}
