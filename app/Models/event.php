<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
 
        'companies_id',
        'event',
        'start_date',
        'finish_date',
        'user_created_at',
        'user_updated_at',
        'description'
         
    ];
}