<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionReading extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_waters_id',
        'trains_id',
        'reading',
        'production',
        'type'
    ];

    public function train()
    {
        return $this->belongsTo(Train::class, 'id', 'trains_id');
    }
}
