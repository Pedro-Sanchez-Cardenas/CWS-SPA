<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantContract extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'plants_id',
        'botM3',
        'botFixed',
        'omM3',
        'omFixed',
        'remineralitation',
        'totalM3',
        'totalMonth',
        'years',
        'from',
        'till',
        'minimunConsumption',
        'billingDay',
        'billingPeriod',
        'user_created_at',
        'user_updated_at'
    ];
}
