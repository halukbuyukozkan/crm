<?php

namespace App\Models;

use App\Observers\PurchaseObserver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','name','description','price','is_approved','is_paid'];

    public static function boot()
    {
        parent::boot();
        static::observe(PurchaseObserver::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function ScopeOfPermission(Builder $query)
    {
        if(Auth::user()->hasAnyPermission('Satın Alma')) {
            return $query->whereHas('user', function (Builder $query) {
                $query->whereHas('department', function (Builder $query) {
                    $query->where('name', Auth::user()->department->name);
                });
            }); 
        }else{
            return $query->whereHas('user',function (Builder $query) {
                $query->where('users.id',Auth::user()->id);
            });
        }
    }
}
