<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobItem extends Model
{
    use HasFactory;

    protected $fillable = ['job_id','filename'];

    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }
}
