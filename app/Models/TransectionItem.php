<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransectionItem extends Model
{
    use HasFactory;

    protected $fillable = ['transection_id','filename'];

    public function transection(): BelongsTo
    {
        return $this->belongsTo(Transection::class);
    }
}
