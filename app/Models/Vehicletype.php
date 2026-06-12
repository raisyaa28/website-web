<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicletype extends Model
{
   protected $table = 'vehicle_type';

     protected $fillable = [ 
        'id',
        'jenis',
        'perjam_pertama',
        'perjam_berikutnya',
        'max_perhari',
        'created_at',
        'updated_at',
     ];

}
