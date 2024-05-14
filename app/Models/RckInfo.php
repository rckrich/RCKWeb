<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class RckInfo extends Model
{
    use HasFactory;

    protected $table = 'rckg_info';

    protected $fillable = [
        'fieldname',
        'value',
        'img_url'
    ];

    protected $appends = [
        'image_url',
    ];

    public function getImageUrlAttribute(){
        return asset(Storage::url($this->img_url));
    }
}
