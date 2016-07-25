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
}
