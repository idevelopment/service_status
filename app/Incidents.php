<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incidents extends Model
{
    public function assignee()
    {
        return $this->hasOne('App\User');
    }
}
