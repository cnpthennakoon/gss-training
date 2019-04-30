<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingProjectStatus extends Model
{
    public function trainingBatch()
    {
        return $this->hasMany('App\TrainingBatch');
    }
}
