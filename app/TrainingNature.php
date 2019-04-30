<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingNature extends Model
{
    public function trainingBatchType(){

        return $this->belongsTo('App\TrainingBatchType');

    }

    public function trainingBatch()
    {
        return $this->hasMany('App\TrainingBatch');
    }
}
