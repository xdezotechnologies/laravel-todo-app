<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filemanager extends Model
{
    use HasFactory;

    protected $table = "filemanager";

    protected $fillable = [
        'title',
        'link',
        'ext',
    ];
}
