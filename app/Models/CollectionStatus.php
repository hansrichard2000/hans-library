<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'collectionStatusName',
    ];

    public function collectionTarget(){
        return $this->hasMany(Collection::class, 'collectionStatusID', 'id');
    }
}
