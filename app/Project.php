<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * Get the manufacturer for the project.
     */
    public function manufacturer()
    {
        return $this->belongsTo('App\Manufacturer');
    }
    /**
     * Get the user who created the project.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    /**
     * Get the region of the project.
     */
    public function region()
    {
        return $this->belongsTo('App\Region');
    }

    /**
     * Get the country of the project.
     */
    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    /**
     * Get the country of the project.
     */
    public function globalProject()
    {
        return $this->belongsTo('App\GlobalProject');
    }

    public function trainingBatch()
    {
        return $this->hasMany('App\TrainingBatch');
    }

    public function qatShortfall()
    {
        return $this->hasMany('App\QatShortfall');
    }
}
