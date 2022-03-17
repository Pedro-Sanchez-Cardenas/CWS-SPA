<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plant extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'location',
        'currencies_id',
        'countries_id',
        'companies_id',
        'cover_path', // nullable
        'installed_capacity',
        'cisterns_quantity',
        'plant_types_id',
        'design_limit',

        'irrigation',
        'sdi',
        'chloride',
        'well_pump',
        'feed_pump',
        'boosterc',
        'feed',
        'reject',

        'attendant', //nullable
        'manager', // nullable
        'user_created_at',
        'user_updated_at' // nullable
    ];

    // Relations
    public function attendantUser()
    {
        return $this->hasOne(User::class, 'id', 'attendant');
    }

    public function Manager()
    {
        return $this->hasOne(User::class, 'id', 'manager');
    }

    public function trains()
    {
        return $this->hasMany(Train::class, 'plants_id', 'id');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currencies_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'countries_id', 'id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'companies_id', 'id');
    }

    public function pretreatments()
    {
        return $this->hasMany(Pretreatment::class, 'plants_id', 'id');
    }

    public function operations()
    {
        return $this->hasMany(Operation::class, 'plants_id', 'id')->orderBy('created_at', 'DESC');
    }

    public function productWaters()
    {
        return $this->hasMany(ProductWater::class, 'plants_id', 'id')->orderBy('created_at', 'DESC');
    }

    public function contract()
    {
        return $this->hasOne(PlantContract::class, 'plants_id', 'id');
    }
}
