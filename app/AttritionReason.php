<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttritionReason extends Model
{

    public function attrition()
    {
        return $this->hasMany('App\Attrition');
    }
}
