<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','name','description','price','is_approved','is_paid'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
