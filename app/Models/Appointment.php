<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'date' => 'datetime',
        'time' => 'datetime',
    ];

    public function client(){
        return $this->belongsTo('App\Models\Client');
    }

    public function getDateAttribute($value){
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getTimeAttribute($value){
        return Carbon::parse($value)->format('H:i A');
    }
}
