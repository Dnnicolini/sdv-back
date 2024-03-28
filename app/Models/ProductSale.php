<?php

namespace App\Models;

use App\Models\Sale;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductSale extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'product_sales';

    protected $fillable = [
        'sale_id',
        'product_id',
        'sales_value',
        'amount',
    ];


    /**
     * Get the sale that owns the ProductSale
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sale(): BelongsTo
    {
        return $this->belongsTo(Sale::class, 'sale_id');
    }

       /**
     * Get the product that owns the ProductSale
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
