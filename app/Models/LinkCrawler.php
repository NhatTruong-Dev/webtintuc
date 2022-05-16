<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkCrawler extends Model
{
    use HasFactory;
    protected $table='link_crawler';
    protected $primaryKey = 'id';
    protected $fillable=[
        'category_id',
        'link_category',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
