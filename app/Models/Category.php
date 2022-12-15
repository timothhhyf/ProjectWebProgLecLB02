<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction;

class Category extends Model
{
    use HasFactory;

    /**
     * Get the Transaction that owns the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
