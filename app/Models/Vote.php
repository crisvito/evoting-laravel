<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Vote extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function kandidat()
    {
        return $this->BelongsTo(Kandidat::class);
    }
}
