<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class SiakadProgramStudi extends Model
{
 protected $connection = 'siakad'; 
 protected $primaryKey = 'kode_prodi';
 protected $keyType = 'string';
protected $table ="program_studi";
 //relasi tabel
 public function jenjang()
 {
 return $this->belongsTo(
 SiakadJenjangPendidikan::class,
 "id_jenj_didik", // foreigh key di program_studi
 "id_jenj_didik" // primary key di jenjang_pendidikan
 );
 }
}
