<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionInvoice extends Model
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
        'current_reading',
        'previous_reading',
        'discounts',
        'discount_type',
        'user_created_at',
        'user_updated_at'
    ];
}
