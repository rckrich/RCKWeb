<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';
    protected $fillable = ['name', 'description', 'banner_img_url', 'icon_url', 'creation_date'];

    public function swTypes()
    {
        return $this->belongsToMany(SwType::class, 'project_types');
    }
}
