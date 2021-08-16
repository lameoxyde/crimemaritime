<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Page;


class Thematique extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nom',
    ];

    public function page()
    {
        return $this->hasMany(Page::class);
    }

}
