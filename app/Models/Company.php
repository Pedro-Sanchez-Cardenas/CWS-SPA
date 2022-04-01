<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'countries_id',
        'services_id',
        'currencies_id'
    ];

    // Relations
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
