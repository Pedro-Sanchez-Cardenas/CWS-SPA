<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment_types extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'user_created_at',
        'user_updated_at'
    ];

    public function UserContracts()
    {
        return $this->hasMany(UserContract::class, 'payment_types_id', 'id');
    }
}
