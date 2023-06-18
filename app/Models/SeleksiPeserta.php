<?php

namespace App\Models;

use illuminate\Database\Eloquent\Model;

class SeleksiPeserta extends Model
{

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $table = 'seleksi_peserta';

    protected $fillable = [
        'id',
        'id_seleksi',
        'id_formulir',
        'hasil'
    ];

    public function Seleksi()
    {
        return $this->belongsTo(
            Seleksi::class,
            "id_seleksi",
            "id"
        );
    }
}
