<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'project_galleries';

    protected $fillable = [
        'img_url',
        'project_id'
    ];

    protected $appends = [
        'image_url',
    ];

    public function getImageUrlAttribute(){
        return asset(Storage::url($this->img_url));
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
