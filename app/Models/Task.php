<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'is_completed',
    ];

    public function scopeTitleLike(Builder $query, ?string $title): Builder {
        if(!empty($title)) {
            return $query->where('title', 'like', '%' . $title . '%');
        }
        return $query;
    }

    // ユーザーとタスクのリレーション（1対多）　 Taskは1人のUserに属する
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
