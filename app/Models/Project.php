<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';

    protected $fillable = [
        'name',
        'description',
        'banner_img_url',
        'icon_url',
        'creation_date'
    ];

    protected $appends = [
        'banner_image_url',
        'icon_image_url'
    ];

    public function getBannerImageUrlAttribute(){
        return asset(Storage::url($this->banner_img_url));
    }

    public function getIconImageUrlAttribute(){
        return asset(Storage::url($this->icon_url));
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class)->orderBy('order', 'ASC');
    }

    public function types(): BelongsToMany
    {
        return $this->belongsToMany(Type::class, 'project_types', 'project_id', 'swtype_id');
    }

    public function links()
    {
        return $this->hasMany(ProjectLink::class, );
    }

    public function videos()
    {
        return $this->hasMany(ProjectVideo::class);
    }
}
