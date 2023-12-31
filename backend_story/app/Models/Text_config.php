<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Text_config extends Model
{
    use HasFactory, LogsActivity, HasApiTokens;
    public $timestamps = false;
    protected $fillable = [
      'page_id',
      'text_id',
      'position'
    ];

    public function belongText()
    {
        return $this->belongsTo('App\Models\Text', 'text_id', 'id');
    }

    public function belongPage() {
        return $this->belongsTo('App\Models\Page', 'page_id', 'id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn(string $eventName) => "This text_config has been {$eventName}")
            ->useLogName('Text_config');
    }
}
