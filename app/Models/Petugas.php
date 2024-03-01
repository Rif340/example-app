<?php
namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;



class Petugas extends Authenticatable
{
    use HasFactory;    

    protected $fillable =[
        "id",
        "nama_petugas",
        "username",
        "password",
        "telp",
        "level"
    ];
    protected $table ="petugas";
}
