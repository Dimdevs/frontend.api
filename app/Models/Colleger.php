<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colleger extends Model
{
    use HasFactory;

    protected $table = 'collegers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'gender',
        'address',
        'image',
    ];

    public function course()
    {
        return $this->hasMany(Course::class, 'colleger_id');
    }
}

