<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    /**
     * Get the projects of the manufacturer.
     */
    public function project()
    {
        return $this->hasMany('App\Project');
    }
}
