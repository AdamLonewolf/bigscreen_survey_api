<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = "roles";
    protected $primaryKey = "id";
    protected $fillable = [
        'role',
    ];

    //Relation entrre la table roles et Users (plusieurs enregistrements dans la table user ont un rôle)
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
