<?php

namespace App\Models;

use App\Enum\TypeEnum;
use App\Enum\StatusEnum;
use App\Observers\TransectionObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transection extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['project_id','transection_category_id','type','payer','payee','price','is_income','status'];
    protected $dates = ['approved_at','completed_at'];

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

    public function transection_items():HasMany
    {
        return $this->hasMany(TransectionItem::class);
    }

    public function scopeOfCompleted(Builder $query,Project $project)
    {
        return $query->whereHas('project', function($query) use($project) {
            $query->where('id',$project->id)
            ->where('status','tamamlandı');
        })->get();
    }

}
