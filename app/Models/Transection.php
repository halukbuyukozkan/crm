<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transection extends Model
{
    use HasFactory;

    protected $fillable = ['project_id','categpry_id','payer','payee','price','is_income'];

    
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function transection_category(): BelongsTo
    {
        return $this->belongsTo(TransectionCategory::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
