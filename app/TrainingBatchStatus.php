<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingBatchStatus extends Model
{
    public function trainingBatch()
    {
        return $this->hasMany('App\TrainingBatch');
    }
    public function attrition()
    {
        return $this->hasMany('App\Attrition');
    }
    public function trainingCenter(){

        return $this->belongsTo('App\TrainingCenter');

    }
}