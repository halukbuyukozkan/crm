<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Permission\Models\Role;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name','role_id'];

    public function role(): HasOne
    {
        return $this->hasOne(Role::class);
    }
}
