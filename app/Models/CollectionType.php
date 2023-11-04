<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CollectionType extends Model
{
    use HasFactory;

    protected $fillable = [
        'collectionTypeName',
    ];

    public function collectionTarget(): HasMany
    {
        return $this->hasMany(Collection::class, 'collectionTypeID', 'id');
    }
}
