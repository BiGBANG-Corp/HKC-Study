<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $table = 'posts';         // テーブル名
    protected $primaryKey = 'post_id';  // プライマリーキー
    protected $guarded = [];            // 代入拒否
    protected $keyType = 'string';      // キーの型
    protected $casts = [
        'post_date' => 'datetime'
    ];

    public $incrementing = false;       // キーが自動連番か

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->attributes['post_id'] = (string) Str::uuid();
    }


    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'post_id', 'post_id');
    }
}
