<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Touch extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'page_id',
        'data',
        'text_id'
    ];
}
