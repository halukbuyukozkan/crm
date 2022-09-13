<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MoneyRequestItem extends Model
{
    use HasFactory;

    protected $fillable = ['money_request_id','type_id','price'];


    public function moneyrequest(): BelongsTo
    {
        return $this->belongsTo(MoneyRequest::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
}
