<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chemical extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_waters_id',

        'calciumChloride',
        'sodiumCarbonate',
        'sodiumHypochlorite',
        'antiscalant',
        'sodiumHydroxide',
        'hydrochloricAcid',
        'kl1',
        'kl2'
    ];

    public function productWater(){
        return $this->belongsTo(ProductWater::class, 'id', 'product_waters_id');
    }
}
