<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Periode extends Model
{
    protected $primaryKey = 'id'; //default: id
    protected $keyType = 'integer'; //default: bigInteger
    protected $table ="periode";
    protected $fillable = [
    'id',
    'aktif'
    ];
}