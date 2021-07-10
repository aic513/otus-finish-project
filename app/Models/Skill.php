<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name'];
    public $timestamps = false;

    public function influences(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Influence::class);
    }
}
