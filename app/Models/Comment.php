<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comment';
    protected $primaryKey = 'id';
    protected $fillable  = [
        'email',
        'name',
        'content',
        'post_id',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }


    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            // ... code here
        });

        self::created(function($model){
//            dd($model);
            DB::table("notifications")->insert([
               'data' => $model->name ." đã bình luận bài viết"
            ]);
        });

        self::updating(function($model){
            // ... code here
        });

        self::updated(function($model){
            // ... code here
        });

        self::deleting(function($model){
            // ... code here
        });

        self::deleted(function($model){
            // ... code here
        });
    }
}
