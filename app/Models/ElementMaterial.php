<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Parental\HasChildren;

class ElementMaterial extends Model
{
    use HasFactory;
    use HasChildren;

    protected $fillable = ['type'];
}
