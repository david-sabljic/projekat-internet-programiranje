<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Glumac extends Model
{
    use HasFactory;
    protected $table = 'glumci';
    public $timestamps = false;
    protected $fillable = ['ime', 'prezime'];
}
