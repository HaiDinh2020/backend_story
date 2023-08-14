<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Text_config extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
      'page_id',
      'text_id',
      'position'
    ];
}