<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Artikel extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'content',
        'meta_description',
        'image',
        'caption_image',
        'status',
        'view',
    ];

     // Relationship dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // Relationship dengan Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    // Tambahkan ini untuk auto-set user_id
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($model) {
            if (empty($model->user_id)) {
                $model->user_id = Auth::id();
            }
        });
    }
}
