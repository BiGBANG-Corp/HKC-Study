<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Comment extends Model
{
    protected $table = 'comments';         // テーブル名
    protected $primaryKey = 'comment_id';  // プライマリーキー
    protected $guarded = [];            // 代入拒否
    protected $keyType = 'string';      // キーの型
    protected $casts = [];

    public $incrementing = false;       // キーが自動連番か

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->attributes['comment_id'] = (string) Str::uuid();
    }
}
