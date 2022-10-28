<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DepartmentFolder extends Model
{
    use HasFactory;

    protected $fillable = ['department_id','name'];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function files(): HasMany
    {
        return $this->hasMany(DepartmentFolderFile::class);
    }

    public function scopeOfUser(Builder $query)
    {
        if(Auth::user()->hasPermissionTo('Dosya Yönetimi')) {
            return $query;
        }else {
            return $query->whereHas('department',function(Builder $department){
                $department->where('id',Auth::user()->department_id);
            });
        }
    }
}
