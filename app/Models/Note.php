<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Note extends Model
{
    use HasFactory;

    protected $table = "notes";

    protected $fillable = ["title", "content"];
}
