<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	use HasFactory;

    public $timestamps = true;

    protected $table = 'books';

    protected $fillable = ['name','author','genre','sinopsis','restriction','main','secondary'];

}
