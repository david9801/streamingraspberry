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
        'name',
        'temas',
        'description',
        'archivo',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
        //un curso pertenece a un user_id con rol de  profesor
    }
}

