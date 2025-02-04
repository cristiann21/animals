<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vet extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'address'];

    public function animals()
    {
        return $this->hasMany(Animal::class);
    }
}
