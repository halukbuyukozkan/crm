<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Departmentfolder extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function departments(): BelongsToMany
    {
        return $this->belongsToMany(Department::class);
    }

    public function files(): HasMany
    {
        return $this->hasMany(DepartmentfolderFile::class);
    }

    public function scopeOfUser(Builder $query)
    {
        if(Auth::user()->hasPermissionTo('Dosya Yönetimi')) {
            return $query;
        }else {
            return $query->whereHas('departments',function(Builder $department){
                $department->where('department_id',Auth::user()->department_id);
            });
        }
    }
}
