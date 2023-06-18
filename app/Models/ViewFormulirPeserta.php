<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViewFormulirPeserta extends Model
{
    protected $primaryKey = 'no_daftar';
    protected $keyType = 'string';
    protected $table = "view_formulir_peserta";
    //relasi program studi
    public function programStudi()
    {
        return $this->belongsTo(
            SiakadProgramStudi::class,
            "program_studi",
            "kode_prodi"
        );
    }
}