<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DepartmentfolderFile extends Model
{
    use HasFactory;

    protected $fillable = ['department_id','departmentfolder_id','filename'];

    public function folder(): BelongsTo
    {
        return $this->belongsTo(Departmentfolder::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}
