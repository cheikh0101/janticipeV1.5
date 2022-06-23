<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Semestre extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    /**
     * Get the anneeAcademique that owns the Semestre
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function anneeAcademique(): BelongsTo
    {
        return $this->belongsTo(AnneeAcademique::class);
    }

    /**
     * Get all of the ues for the Semestre
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ues(): HasMany
    {
        return $this->hasMany(Ue::class);
    }
}
