<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    protected $fillable = [
        'name', 'year', 'description', 'teacher','group_id'
    ];
    public function eventclasses(){
        return $this->hasMany(EventClass::class,'subject_id');
        //una asignatura puede tener varios eventos-clases
    }
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'subject_group', 'subject_id', 'group_id');
    }

}

