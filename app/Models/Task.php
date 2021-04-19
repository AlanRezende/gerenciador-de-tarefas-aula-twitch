<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['task', 'done_at', 'project_id'];

    protected $casts = [
        'done_at' => 'datetime'
    ];
}
