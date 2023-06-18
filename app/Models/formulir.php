<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Formulir extends Model
{
        protected $primaryKey = 'no_daftar';
        protected $keyType = 'string';
        protected $table ="formulir";
        protected $fillable = [
        'no_daftar',
        'id_periode',
        'id_user',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'telp',
        'program_studi'
    ];

    //relasi periode
    public function periode()
    {
        return $this->belongsTo(
        Periode::class,
        "id_periode", // foreigh key di formulir
        "id" // primary key di periode
        );
    }

    //relasi user
    public function user()
    {
        return $this->belongsTo(
        User::class,
        "id_user", // foreigh key di formulir
        "id" // primary key di users
        );
    }
    
    //relasi program studi
    public function programStudi()
    {
        return $this->belongsTo(
        SiakadProgramStudi::class,
        "program_studi", // foreigh key di formulir
        "kode_prodi" // primary key di siakad_udb.program_studi
        );
    }
}