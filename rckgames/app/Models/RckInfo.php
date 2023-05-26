<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RckInfo extends Model
{
    use HasFactory;
    protected $table = 'rckg_info';
    protected $fillable = ['fieldname', 'value','img_url'];
}
