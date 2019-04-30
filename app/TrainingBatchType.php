<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingBatchType extends Model
{
    public function trainingNature()
    {
        return $this->hasMany('App\TrainingNature');
    }
    public function trainingBatch()
    {
        return $this->hasMany('App\TrainingBatch');
    }
}
