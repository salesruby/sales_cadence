<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmsCadence extends Model
{
    protected $fillable = ['user_id', 'cadence_id','temp', 'sms_template_id', 'message', 'date', 'delivered'];

}
