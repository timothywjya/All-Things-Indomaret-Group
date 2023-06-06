<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model{
    protected $fillable = [
        'id',
        'todo'
    ];
    protected $dates = [
        'delete_at'
    ];
}
