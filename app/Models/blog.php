<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class blog extends Model
{
    use HasFactory, SoftDeletes;
    // Tùy chỉnh tên cột xóa mềm
    protected $dates = ['is_deleted'];

    const DELETED_AT = 'is_deleted';
    protected $fillable = ['title', 'content', 'author'];
}
