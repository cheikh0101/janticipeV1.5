<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Traits\Uuids;


class Document extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory, Uuids;

    public function setDocumentAttribute($value)
    {
        $attribute_name = "document";
        $disk = "local";
        $destination_path = "document/";
        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }

    /**
     * Get the classe that owns the Document
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function classe(): BelongsTo
    {
        return $this->belongsTo(Classe::class);
    }

    /**
     * Get the cours that owns the Document
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cours(): BelongsTo
    {
        return $this->belongsTo(Cour::class);
    }

    /**
     * Get the user that owns the Document
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the typeDocuments for the Document
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function typeDocuments(): HasMany
    {
        return $this->hasMany(TypeDocument::class);
    }
}
