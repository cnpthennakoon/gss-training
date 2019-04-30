<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingBatch extends Model
{
    public function project(){

        return $this->belongsTo('App\Project');

    }
    public function trainingCenter(){

        return $this->belongsTo('App\TrainingCenter');

    }
    public function user(){

        return $this->belongsTo('App\User');

    }
    public function trainingBatchStatus(){

        return $this->belongsTo('App\TrainingBatchStatus');

    }
    public function trainingProjectStatus(){

        return $this->belongsTo('App\TrainingProjectStatus');

    }
    public function trainingBatchType(){

        return $this->belongsTo('App\TrainingBatchType');

    }
    public function trainingNature(){

        return $this->belongsTo('App\TrainingNature');

    }
    public function attrition()
    {
        return $this->hasMany('App\Attrition');
    }
}
