<?php

namespace App\Models;

use App\Observers\ProjectObserver;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','name','description','type','total'];

    public static function boot()
    {
        parent::boot();
        Project::observe(ProjectObserver::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function transections(): HasMany
    {
        return $this->hasMany(Transection::class);
    }
    
    public function scopeOfProject(Builder $query)
    {
        if(Auth::user()->hasPermissionTo('Ödeme Talebi Kabul Etme'))
        {
            return $query->whereHas('user',function(Builder $query){
                $query->whereHas('department',function(Builder $query){
                    $query->where('name',Auth::user()->department->name);
                });
            });
        }elseif(Auth::user()->hasPermissionTo('Ödeme Gerçekleştirme'))
        {
            return $query;
        }elseif(Auth::user()->hasPermissionTo('Yetkili Ödeme Talep Kabul Etme'))
        {
            return $query;
        }else
        {
            return $query->where('user_id',Auth::user()->id);
        }
    }
}
