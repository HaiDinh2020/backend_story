<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Text extends Model
{
    use HasFactory, LogsActivity, HasApiTokens;
    public $timestamps = false;
    protected $fillable = [
        'text',
    ];

    public function hasAudio() {
        return $this->hasOne('App\Models\Audio', 'text_id', 'id');
    }

    public function hasText_config() {
        return $this->hasMany('App\Models\Text_config', 'text_id', 'id');
    }

    public function hasTouch()
    {
        return $this->hasOne('App\Models\Touch', 'text_id', 'id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn(string $eventName) => "This text has been {$eventName}")
            ->useLogName('Text');
    }
}
