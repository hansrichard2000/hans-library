<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = [
        'collectionCode',
        'collectionName',
        'collectionAuthor',
        'collectionPublishYear',
        'collectionDesc',
        'collectionTypeID',
        'collectionStatusID'
    ];

    public function collectionType(){
        return $this->belongsTo(CollectionType::class, 'collectionTypeID', 'id');
    }

    public function collectionStatus(){
        return $this->belongsTo(CollectionStatus::class, 'collectionStatusID', 'id');
    }

    public function collectionSubject(){
        return $this->belongsToMany(Subject::class)->withTimestamps();
    }

    public function borrower(){
        return $this->belongsToMany(User::class)->withPivot('is_approved')->withPivot('is_approved');
    }


}
