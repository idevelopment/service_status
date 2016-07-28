<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Comments
 * @package App
 */
class Comments extends Model
{
    /**
     * Mass-assign fields
     *
     * @var array
     */
    protected $fillable = ['comment'];

    /**
     * Hidden fields
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

    /**
     * Get the incident information about the issue.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function incident()
    {
        return $this->belongsToMany('App\Incidents')
    }

    /**
     * Get the author information about the comment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo('App\User');
    }
}
