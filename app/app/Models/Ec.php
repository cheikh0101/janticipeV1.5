<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ec extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    /**
     * Get all of the documents for the Ec
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    /**
     * Get the ue that owns the Ec
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ue(): BelongsTo
    {
        return $this->belongsTo(Ue::class);
    }
}
