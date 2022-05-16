<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';
    protected $primaryKey = 'id';
    protected $fillable  = ['name'];

    public function post(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Post::class);
    }
    public function crawler(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(LinkCrawler::class);
    }
}
