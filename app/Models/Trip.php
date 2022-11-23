<?php

namespace App\Models;

use App\Observers\TripObserver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function scopeOfPermission(Builder $query)
    {
        if(Auth::user()->hasPermissionTo('Seyahat Yönetimi')) {
            return $query->whereHas('user',function(Builder $query){
                $query->whereHas('department',function(Builder $query){
                    $query->where('name',Auth::user()->department->name);
                });
            });
        }else {
            return $query->where('user_id',Auth::user()->id);
        }
    }
}
