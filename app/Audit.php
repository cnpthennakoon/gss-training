<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    /**
     * Get the project that owns the audit.
     */
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
    /**
     * Get the user who did the audit.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    /**
     * Get the user who did the audit.
     */
    public function dailyEvaluation()
    {
        return $this->hasMany('App\DailyEvaluation');
    }
    /**
     * Get the pos details of the audit.
     */
    public function pos()
    {
        return $this->hasMany('App\Pos');
    }
    /**
     * Get the pricing details of the audit the audit.
     */
    public function pricing()
    {
        return $this->hasMany('App\Pricing');
    }
    /**
     * Get the pricing details of the audit the audit.
     */
    public function imageFlawData()
    {
        return $this->hasMany('App\ImageFlawData');
    }
    /**
     * Get the pricing details of the audit the audit.
     */
    public function errorTypeData()
    {
        return $this->hasMany('App\ErrorTypeData');
    }
    /**
     * Get the pricing details of the audit the audit.
     */
    public function responsibilityData()
    {
        return $this->hasMany('App\ResponsibilityData');
    }
    /**
     * Get the pricing details of the audit the audit.
     */
    public function posData()
    {
        return $this->hasMany('App\PosData');
    }
    /**
     * Get the pricing details of the audit the audit.
     */
    public function pricingData()
    {
        return $this->hasMany('App\PricingData');
    }
}
