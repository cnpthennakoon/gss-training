<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GlobalProject extends Model
{
    /**
     * Get the projects that owns the global project.
     */
    public function project()
    {
        return $this->hasMany('App\Project');
    }
}
