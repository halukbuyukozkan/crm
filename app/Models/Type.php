<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    use HasFactory;

    protected $fillable = ['name','type_id'];

    public function types():HasMany
    {
        return $this->hasMany(Type::class);
    }

    public function moneyrequestitem():HasMany
    {
        return $this->hasMany(MoneyRequestItem::class);
    }
}
