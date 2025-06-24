<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TerrainImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'terrain_id',
        'image_path',
        'created_at',
        'updated_at',
    ];

    public function terrain()
    {
        return $this->belongsTo(Terrain::class);
    }
}