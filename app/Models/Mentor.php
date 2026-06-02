<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    protected $table = 'tabel_mentor';

    protected $fillable = [
        'nama',
        'email',
        'telepon',
        'keahlian',
    ];

    public function pelatihans()
    {
        return $this->hasMany(Pelatihan::class, 'mentor_id');
    }
}
