<?php

namespace App\Models;

use App\Observers\TransectionObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Enum\TypeEnum;

class Transection extends Model
{
    use HasFactory;

    protected $fillable = ['project_id','category_id','type','payer','payee','price','is_income','is_completed'];

    protected $casts = [
        'type' => TypeEnum::class
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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
