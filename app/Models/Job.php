<?php

namespace App\Models;

use App\Observers\JobObserver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;

    protected $fillable = ['status_id','name','description','deadline','created_by','updated_by'];

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function job_items(): HasMany
    {
        return $this->hasMany(JobItem::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(JobComment::class);
    }

    public function scopeOfJob(Builder $query)
    {
        if(Auth::user()->hasAnyPermission('Genel Görev Atama')) {
            return $query->whereHas('users', function (Builder $query) {
                $query->whereHas('department', function (Builder $query) {
                    $query->where('name', Auth::user()->department->name);
                });
            }); 
        }else{
            return $query->whereHas('users',function (Builder $query) {
                $query->where('users.id',Auth::user()->id);
            });
        }
    }
}
