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
        'cover_path', // nullable
        'installed_capacity',
        'design_limit',

        'companies_id',
        'clients_id',
        'personalitation_plants_id',
        'countries_id',
        'plant_types_id',
        'operator', //nullable
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
        return $this->hasMany(Pretreatment::class, 'plants_id', 'id')->orderBy('created_at', 'DESC');
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
