<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Page extends Model
{
    use HasFactory, LogsActivity, HasApiTokens;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'story_id',
        'background',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn(string $eventName) => "This page has been {$eventName}")
            ->useLogName('Page');
    }
}
