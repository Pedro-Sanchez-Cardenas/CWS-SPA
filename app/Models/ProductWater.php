<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductWater extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'plants_id',

        'ph',
        'hardness',
        'tds',
        'h2s',

        'freeChlorine',
        'chloride',

        'observations',

        'user_created_at',
        'user_updated_at'
    ];

    public function plant(){
        return $this->belongsTo(Plant::class, 'id', 'plants_id');
    }

    public function assignedBy(){
        return $this->hasOne(User::class, 'id', 'user_created_at');
    }

    public function readings(){
        return $this->hasMany(ProductionReading::class, 'product_waters_id', 'id');
    }

    public function chemical(){
        return $this->hasOne(Chemical::class, 'product_waters_id', 'id');
    }
}
