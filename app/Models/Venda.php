<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_da_venda',
        'product_id',
        'cliente_id',
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function cliente() {
        return $this->belongsTo(Cliente::class);
    }

    public function getVendasPesquisarIndex(string $search = '') {
        $venda = $this->where(function($query) use ($search) {
            if($search) {
                $query->where('numero_da_venda', $search);
                $query->orWhere('numero_da_venda', 'LIKE', "%{$search}%");
            }
        })->get();

        return $venda;
    } 

}
