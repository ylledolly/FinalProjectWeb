<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Landing extends Model
{
    use HasFactory;
    //table name
    protected $table = 'landings';

    //primary key
    public $primarykey = 'id';

    //Timestamps

    public $timestamps = true;
}
