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
        'register',

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

    public function plant()
    {
        return $this->belongsTo(Plant::class, 'plants_id', 'id');
    }

    public function train()
    {
        return $this->belongsTo(Train::class, 'trains_id', 'id');
    }

    public function assignedBy()
    {
        return $this->belongsTo(User::class, 'user_created_at', 'id');
    }

    public function boosters()
    {
        return $this->hasMany(Booster::class, 'operations_id', 'id');
    }
}
