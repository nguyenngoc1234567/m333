<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';

    // protected $guarded = [];
    // protected $fillable = ['id','name','price','category_id','image','description'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
}
