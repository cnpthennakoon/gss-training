<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingCenter extends Model
{
    public function trainingBatch()
    {
        return $this->hasMany('App\TrainingBatch');
    }
}
