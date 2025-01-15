<?php
// Model: Scrap.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scrap extends Model
{
    use HasFactory;

    protected $table = 'scrap_pwk';

    protected $fillable = [
        'dataset_id',
        'website_link',
        'title',
        'backdoor',
        'level',
        'deskripsi',
        'waktu'
    ];
}