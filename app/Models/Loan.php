<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = ['collectionID', 'userID', 'is_approved', 'loan_date', 'expiration_date'];

    public $timestamps = false;

    public function loan(): BelongsTo
    {
        return $this->belongsTo(Collection::class, 'collectionID', 'id');
    }

    public function borrower(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userID', 'id');
    }


}
