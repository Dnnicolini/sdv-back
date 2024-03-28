<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Provider;
use App\Models\Users\User;
use App\Models\ProductSale;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'value',
        'sales_value',
        'amount',
        'bar_code',
        'code',
        'expiry_date',
        'description',
        'product_pic',
        'category_id',
        'provider_id',
        'user_id',
    ];


    /**
     * Get the user that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the category that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function provider(): BelongsTo
    {
        return $this->belongsTo(Provider::class, 'provider_id');
    }

    /**
     * Get the category that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Get all of the product_sale for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product_sale(): HasMany
    {
        return $this->hasMany(ProductSale::class, 'product_id');
    }
}
