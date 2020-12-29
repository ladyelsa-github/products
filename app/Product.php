<?php

namespace App;

use Illuminate\Database\Eloquent\Model\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'sku',
        'description'      
    ];
}
