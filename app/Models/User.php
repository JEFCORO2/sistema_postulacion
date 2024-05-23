<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Rol;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'apellidos',
        'tel',
        'estado',
        'rols_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    //METOO PARA LAS IMAGENES EN EL ADMIN
    public function adminlte_image(){
        return 'https://picsum.photos/300/300';
    }

    public function adminlte_desc(){
        if($this->rols_id == 1){
            $rol = 'Admin';
        }else if($this->rols_id == 2){
            $rol = 'Postulante';
        }else{
            $rol = 'Psicólogo';
        }
        return $rol;
    }

    public function descripcionRol(User $user){
        $rol ;
        if($user->rols_id == 1){
            $rol = 'Admin';
        }else if($user->rols_id == 2){
            $rol = 'Postulante';
        }else{
            $rol = 'Psicólogo';
        }
        return $rol;
    }

    public function roles(){
        return $this->hasMany(Rol::class);
    }
}
