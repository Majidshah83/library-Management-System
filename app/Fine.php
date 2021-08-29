<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fine extends Model
{   
     protected $table='fines';
     protected $fillable=['id','fine','receivefine'];
     public $timestamps=false;
     protected $primaryKey = 'id';

}
