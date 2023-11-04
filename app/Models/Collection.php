<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Collection extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters){

//        if (isset($filters['search']) ? $filters['search'] : false){
//            return $query->where('collectionName', 'like', '%' . $filters['search'] . '%')
//                ->orWhere('collectionDesc', 'like', '%' . $filters['search'] . '%');
//        }
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('collectionName', 'like', '%' . $search . '%')
                ->orWhere('collectionDesc', 'like', '%' . $search . '%');
        });

//        $query->when($filters['subject'] ?? false, function ($query, $subject){
//            return $query->whereHas('')
//        });

        $query->when($filters['author'] ?? false, function ($query, $author){
            return $query->where('collectionAuthor', 'like', '%' . $author . '%');
        });


    }


    protected $fillable = [
        'collectionCode',
        'collectionName',
        'collectionAuthor',
        'collectionPublisher',
        'collectionPublishYear',
        'collectionDesc',
        'collectionImage',
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

    public function loan(): HasMany
    {
        return $this->hasMany(Loan::class, 'userID', 'id');
    }
}
