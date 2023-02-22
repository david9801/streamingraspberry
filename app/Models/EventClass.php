<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'date', 'description',  'subject_id'
    ];


    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
        //una evento-clase pertenece a un solo turno (shift)
    }
}
