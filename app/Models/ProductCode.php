<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCode extends Model
{
    public $timestamps = true;
    use HasFactory;
    protected $table = 'product_codes';

}
