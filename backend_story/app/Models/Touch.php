<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Touch extends Model
{
    use HasFactory, LogsActivity, HasApiTokens;
    public $timestamps = false;
    protected $fillable = [
        'page_id',
        'data',
        'text_id'
    ];

    public function belongPage() {
        return $this->belongsTo('App\Models\Page', 'page_id', 'id');
    }

    public function belongText() {
        return $this->belongsTo('App\Models\Text', 'text_id', 'id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn(string $eventName) => "This touch has been {$eventName}")
            ->useLogName('Touch');
    }
}
