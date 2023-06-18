<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class SiakadJenjangPendidikan extends Model
{
 protected $connection = 'siakad'; //konfigurasi di config/database.php
 protected $primaryKey = 'id_jenj_didik';
 protected $keyType = 'integer';
protected $table = "jenjang_pendidikan";
}