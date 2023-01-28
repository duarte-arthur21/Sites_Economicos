<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mail_admin extends Model
{
    use HasFactory;

    protected $table = "mail_admin";
    protected $fillable = [
        'email',
        'assunto',
        'texto',
    ];
}
