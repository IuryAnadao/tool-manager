<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name',
        'label'
    ];

    public function tools()
    {
        return $this->belongsToMany(Tool::class)->withTimestamps();
    }

    public function toolsWithoutTimestamps()
    {
        return $this->belongsToMany(Tool::class);
    }

}
