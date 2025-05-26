<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'is_completed',
    ];

    // ユーザーとタスクのリレーション（1対多）　 Taskは1人のUserに属する
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
