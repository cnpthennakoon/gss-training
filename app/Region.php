<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    /**
     * Get the region that owns the country.
     */
    public function country()
    {
        return $this->hasMany('App\Country');
    }
}
