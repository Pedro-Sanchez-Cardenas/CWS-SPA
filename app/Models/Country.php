<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'taxes',
        'currencies_id',
        'user_created_at',
        'user_updated_at'
    ];

    // Relations
    public function currency(){
        return $this->hasOne(Currency::class, 'id', 'currencies_id');
    }

    public function plants(){
        return $this->hasMany(Plant::class, 'country_id', 'id');
    }
}
