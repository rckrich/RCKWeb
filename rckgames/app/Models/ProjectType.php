<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectType extends Model
{
    use HasFactory;
    protected $table = 'project_types';
    protected $fillable = ['project_id', 'swtype_id'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function swType()
    {
        return $this->belongsTo(SwType::class);
    }
}
