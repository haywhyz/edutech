<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    //
    protected $table = 'curriculums';

    protected $fillable = [
        'name', 'subject_id', 'resources_id'
    ];
}
