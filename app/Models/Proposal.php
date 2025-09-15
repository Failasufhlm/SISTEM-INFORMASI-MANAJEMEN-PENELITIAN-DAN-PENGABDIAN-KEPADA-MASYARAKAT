<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'type',
        'file_path',
        'status',
    ];

    // Relasi ke User (dosen yang upload proposal)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Review (reviewer menilai proposal)
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function progressReports()
    {
        return $this->hasMany(ProgressReport::class);
    }

    public function finalReports()
    {
        return $this->hasMany(FinalReport::class);
    }

    public function outputs()
    {
        return $this->hasMany(Output::class);
    }
}
