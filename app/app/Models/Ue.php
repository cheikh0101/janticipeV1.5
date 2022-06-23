<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ue extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get all of the ecs for the Ue
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ecs(): HasMany
    {
        return $this->hasMany(Ec::class);
    }

    /**
     * Get the semestre that owns the Ue
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function semestre(): BelongsTo
    {
        return $this->belongsTo(Semestre::class);
    }
}
