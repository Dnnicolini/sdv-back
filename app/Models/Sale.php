<?php

namespace App\Models;

use App\Models\Users\User;
use App\Models\ProductSale;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sale extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sales';

    protected $fillable = [
        'value',
        'user_id',
    ];

    /**
     * Get the user that owns the Sale
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get all of the product_sales for the Sale
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product_sales(): HasMany
    {
        return $this->hasMany(ProductSale::class, 'sale_id');
    }
}
