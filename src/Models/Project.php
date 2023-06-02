<?php

namespace App\Models;

class Project extends Model
{
    protected static string $table = 'projects';

    public function images()
    {
        return Image::where(['project_id' => $this->id]);
    }
}