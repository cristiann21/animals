<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = ['name', 'weight', 'age', 'description', 'owner_id', 'vet_id'];

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function vet()
    {
        return $this->belongsTo(Vet::class);
    }
}
