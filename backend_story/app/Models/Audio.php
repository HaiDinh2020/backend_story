<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Audio extends Model
{
    use HasFactory, LogsActivity;
    public $timestamps = false;
    protected $fillable = [
        'audio',
        'text_id'
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn(string $eventName) => "This audio has been {$eventName}")
            ->useLogName('Audio');
    }
}
