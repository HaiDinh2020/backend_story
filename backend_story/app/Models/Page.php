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
    public function hasTouch()
    {
        return $this->hasMany('App\Models\Touch', 'page_id', 'id');
    }

    public function hasText_config () {
        return $this->hasMany('App\Models\Text_config', 'page_id', 'id');
    }

    public function belongStory() {
        return $this->belongsTo('App\Models\Story', 'story_id', 'id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn(string $eventName) => "This page has been {$eventName}")
            ->useLogName('Page');
    }
}
