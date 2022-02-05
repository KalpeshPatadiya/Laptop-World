<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = 'subcategories';
    protected $fillable = [
        'name',
        'cat_id',
        'slug',
        'description',
        'image',
        'status',
        'popular',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }
}
