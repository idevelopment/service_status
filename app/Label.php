<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    /**
     * Mass-assign fields.
     *
     * @var array
     */
    protected $fillable = ['name', 'color', 'description'];

    /**
     * Hidden fields
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];
}
