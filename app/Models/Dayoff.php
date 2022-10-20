<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dayoff extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','title','color','is_approved','start_date','end_date'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeOfUser(Builder $query)
    {
        if(Auth::user()->hasPermissionTo('İzin Yönetimi')){
            return $query->whereHas('user',function($user){
                $user->where('department_id',Auth::user()->department_id);
            });
        }else{
            return $query->where('user_id',Auth::user()->id);
        }
        
    }
}
