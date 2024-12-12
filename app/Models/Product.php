<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "price",
        "content",
        "sale",
        "hit",
        "category_id",
        "status_id",
        "img",
        "data_id",
    ];

    public function sluggable(){
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function data(){
        return $this->belongsTo(Data::class);
    }
    
    public function status(){
        return $this->belongsTo(Status::class);
    }
    public function getImage(){
        if (!$this->img) {
            return asset('assets\front\img\no-image.png');
        } else {
            return asset("storage/{$this->img}");
        }
    }
}