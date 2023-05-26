<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SwType extends Model
{
    use HasFactory;
    protected $table = 'sw_types';
    protected $fillable = ['name'];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_types');
    }

}
