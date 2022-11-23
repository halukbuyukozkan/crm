<?php

namespace App\Models;

use App\Observers\TripObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','name','description','location','start_at','end_at'];

    public static function boot()
    {
        parent::boot();
        Trip::observe(TripObserver::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
