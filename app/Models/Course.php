<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';
    protected $primaryKey = 'id';
    protected $fillable = [
        'colleger_id',
        'name',
    ];

    public function colleger()
    {
        return $this->belongsTo(Colleger::class, 'colleger_id');
    }
}
