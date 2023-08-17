<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Story extends Model
{
    use HasFactory, LogsActivity, HasApiTokens;

    public $timestamps = false;
    protected $fillable = [
        'name',
        'thumbnail',
        'author',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn(string $eventName) => "This story has been {$eventName}")
            ->useLogName('Story');
    }
}
