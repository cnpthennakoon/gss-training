<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttritionType extends Model
{

    public function attrition()
    {
        return $this->hasMany('App\Attrition');
    }
}
