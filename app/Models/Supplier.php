<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact_info',
        'created_by',
    ];

    // Relasi ke Admin yang buat supplier ini
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }
}
