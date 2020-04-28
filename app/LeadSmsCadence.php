<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeadSmsCadence extends Model
{
    protected $table = 'lead_sms_cadence';
    public function lead(){
        return $this->belongsTo(Lead::class, 'user_id', 'id');
    }
}
