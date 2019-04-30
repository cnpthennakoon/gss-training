<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attrition extends Model
{
    public function attritionType(){

        return $this->belongsTo('App\AttritionType');

    }
    public function attritionReason(){

        return $this->belongsTo('App\AttritionReason');

    }
    public function account(){

        return $this->belongsTo('App\Account');

    }
    public function trainingBatch(){

        return $this->belongsTo('App\TrainingBatch');

    }
}
