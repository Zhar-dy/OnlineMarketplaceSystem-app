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
        'stock_quantity',
    ];

    public function catergory()
    {
        return $this->
    }
}
