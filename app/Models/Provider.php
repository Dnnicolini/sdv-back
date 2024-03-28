<?php

namespace App\Models;

use App\Models\Users\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provider extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'providers';

    protected $fillable = [
        'company_name',
        'cnpj',
        'address_street',
        'address_district',
        'address_number',
        'address_zip',
        'address_city',
        'address_state',
        'phone',
        'email',
        'user_id'
    ];

    /**
     * Get the user that owns the Provider
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
