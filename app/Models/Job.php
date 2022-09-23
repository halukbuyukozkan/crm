<?php

namespace App\Models;

use App\Observers\JobObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Job extends Model
{
    use HasFactory;

    protected $fillable = ['status_id','name','description','deadline','created_by','updated_by'];

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
