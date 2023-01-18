<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'description'
    ];

    /**
     * Get the Transaction that owns the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Transaction()
    {
        return $this->hasMany(Transaction::class);
    }
}
