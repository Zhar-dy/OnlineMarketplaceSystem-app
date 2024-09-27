<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";

    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'seller_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,  'seller_id');
    }
    public function catergory()

    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->belongsTo(Review::class);
    }

    public function order_items()
    {
        return $this->hasMany(order::class);
    }

    
}
