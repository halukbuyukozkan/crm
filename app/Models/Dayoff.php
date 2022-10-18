<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dayoff extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','title','start_date','end_date'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}