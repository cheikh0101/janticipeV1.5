<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AnneeAcademique extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    /**
     * Get all of the semestres for the AnneeAcademique
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function semestres(): HasMany
    {
        return $this->hasMany(Semestre::class);
    }
}
