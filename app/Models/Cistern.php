<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cistern extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_waters_id',
        'plants_id',
        'capacity',
        'status'
    ];

    public function plant()
    {
        return $this->belongsTo(Plant::class, 'id', 'plants_id');
    }
}
