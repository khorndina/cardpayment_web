<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariantItem extends Model
{
    use HasFactory;

    /**Create Relationship bettween ProductVariant with ProductVariantItem */
    public function productVariant(){
        return $this->belongsTo(ProductVariant::class);
    }
}
