<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'location';

    protected $fillable = [
    'id',
    'location_name',
    'max_motorcycle',
    'max_car',
    'max_other',
    'created_at',
    'updated_at',
     ];
}
