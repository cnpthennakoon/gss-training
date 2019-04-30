<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * Get the region that owns the country.
     */
    public function region()
    {
        return $this->belongsTo('App\Region');
    }
    /**
     * Get the user who created the country.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
