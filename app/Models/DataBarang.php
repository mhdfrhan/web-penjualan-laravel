<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
	use HasFactory;

	protected $guarded = ['id'];

	public function scopeFilter($query, array $filters)
	{

			$query->when($filters['search'] ?? false, function ($query, $search) {
				return $query->where('merk_brg', 'like', '%' . $search . '%');
			});
	}

	public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
