<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Book extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['rak'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('judul', 'like', '%' . $search . '%');
        });

        $query->when($filters['barcode'] ?? false, function ($query, $barcode) {
            return $query->where('no_barcode', 'like', '%' . $barcode . '%');
        });
    }

    public function rak()
    {
        return $this->belongsTo(Rak::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
