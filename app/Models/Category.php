<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'created_by',
    ];

    // Relasi ke Admin (creator)
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }
}
