<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Post extends Model
{
    use HasFactory;
    protected $table='post';
    protected $fillable=[
        'title',
        'image',
        'title_image',
        'sub_title',
        'details',
        'category_id',
        'thematic_id',
        ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function thematic(){
        return $this->belongsTo(Thematic::class);
    }


}
