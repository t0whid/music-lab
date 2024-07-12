<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'artist',
        'image',
        'duration',
        'description',
        'file_path',
        'view_count',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
