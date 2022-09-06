<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Quotes extends Model
{
	use HasFactory, HasTranslations;

	public $translatable = ['quote'];

	protected $guarded = [];

	public function movie()
	{
		return $this->belongsTo(Movies::class, 'movie_id');
	}
}
