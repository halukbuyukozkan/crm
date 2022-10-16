<?php

namespace App\Models;

use App\Observers\ProjectObserver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id','name','description','type','total','completedtotal'];

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

    public function scopeOfCompleted(Builder $query)
    {
        return $query->whereHas('transections', function(Builder $query){
            $query->where('status','tamamlandı');
        });
    }

    public function completedtotalprice($project)
    {
        $completed = $project->transections->filter(function($item){
            return $item->status->value == 'tamamlandı';
        });

        $price = $completed->map(function($transection){
            return ($transection->price);
        });
        $price = $price->sum();
        
        return $price;
    }
    
    public function totalprice($project)
    {
        $price = $project->transections->map(function($transection){
            return ($transection->price);
        });
        $price = $price->sum();
        return $price;
    }   
}
