<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'plants_id',
        'trains_id',

        'hp',
        'hpF',

        'sdi',
        'ph',
        'temperature',

        'feed',
        'permeated',
        'rejection',

        'feedFlow',
        'rejectFlow',
        'permeateFlow',

        'hpIn',
        'hpOut',
        'reject',

        'observations',
        'user_created_at',
        'user_updated_at'
    ];

    public function train(){
        return $this->belongsTo(Train::class, 'id', 'trains_id');
    }

    public function assignedBy(){
        return $this->hasOne(User::class, 'id', 'user_created_at');
    }

    public function boos(){
        return $this->hasMany(Booster::class, 'operations_id', 'id');
    }
}
