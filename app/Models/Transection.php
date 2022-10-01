<?php

namespace App\Models;

use App\Enum\TypeEnum;
use App\Enum\StatusEnum;
use App\Observers\TransectionObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transection extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['project_id','category_id','type','payer','payee','price','is_income','status'];

    protected $casts = [
        'type' => TypeEnum::class,
        'status' => StatusEnum::class
    ];

    public static function boot()
    {
        parent::boot();
        Transection::observe(TransectionObserver::class);
    }
    
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function transection_category(): BelongsTo
    {
        return $this->belongsTo(TransectionCategory::class);
    }

}
