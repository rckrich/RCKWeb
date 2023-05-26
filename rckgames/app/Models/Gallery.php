<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $table = 'project_galleries';
    protected $fillable = ['img_url'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
