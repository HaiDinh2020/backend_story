<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Audio extends Model
{
    use HasFactory, LogsActivity, HasApiTokens;
    public $timestamps = false;
    protected $fillable = [
        'audio',
        'text_id'
    ];

    public function belongText()
    {
        return $this->belongsTo('App\Models\Text', 'text_id', 'id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn(string $eventName) => "This audio has been {$eventName}")
            ->useLogName('Audio');
    }
}
