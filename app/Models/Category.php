<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'description',
        'uuid',
        'attachment'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function scopeSearch($query, $search = null)
    {
        $query->where(function ($query2) use ($search){
            if ($search){
                $query2->where('name' , 'LIKE' , '%' . $search . '%');
            }
            return $query2;
        });
        return $query;
    }
}
