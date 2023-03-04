<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function article() {
        return $this->hasMany(Article::class);
    }

    public function user() {
        return $this->belongsTo(Category::class);
    }
}