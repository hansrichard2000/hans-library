<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionType extends Model
{
    use HasFactory;

    protected $fillable = [
        'collectionTypeName',
    ];

    public function collectionTarget(){
        return $this->hasMany(Collection::class, 'collectionTypeID', 'id');
    }
}
