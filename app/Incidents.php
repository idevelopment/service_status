<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Incidents
 * @package App
 */
class Incidents extends Model
{
    /**
     * Mass-assign fields.
     * 
     * @var array
     */
    protected $fillable = ['title', 'message', 'assigned'];

    /**
     * Assignee relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function assignee()
    {
        return $this->hasOne('App\User');
    }

    /**
     * Incidents -> Status relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function issues()
    {
        return $this->belongsToMany('App\IncidentStatus');
    }

    /**
     * Incident -> Service relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function services()
    {
        return $this->belongsToMany('App\Service');
    }

    /**
     * Incident -> Comment relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function comments()
    {
        return $this->belongsToMany('App\Comments');
    }
}
