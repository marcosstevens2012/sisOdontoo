<?php

namespace sisOdonto;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use sisOdonto\TipoUsuario;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


        public function educacion()
      {
        return $this->hasMany('App\Educacion', 'idUsuario', 'id');
      }


        public function publicaciones()
      {
        return $this->hasMany('App\Publicaciones', 'idUsuario', 'id');
      }


        public function proyectos()
      {
        return $this->hasMany('App\Proyectos', 'idUsuario', 'id');
      }


          public function delpais()
      {
        return $this->hasOne('App\Pais', 'id', 'pais');
      }



      public function scopeBusqueda($query,$pais,$dato="")
     {

            if($pais==0){ 
            $resultado= $query->where('nombres','like','%'.$dato.'%')
                              ->orWhere('apellidos','like', '%'.$dato.'%')
                               ->orWhere('email','like', '%'.$dato.'%');
            }
            else{
               
               //select * from users where pais = $pais  and (nombres like %$dato% or apellidos like %$dato%  or email like  %$dato% )
              $resultado= $query->where("pais","=",$pais)
                                  ->Where(function($q) use ($pais,$dato)  {
                                    $q->where('nombres','like','%'.$dato.'%')
                                      ->orWhere('apellidos','like', '%'.$dato.'%')
                                      ->orWhere('email','like', '%'.$dato.'%');       
                                   });

             }                     
        
        return  $resultado;
     }

     
      public function tipo($idtipo)
      {
        $resul=TipoUsuario::find($idtipo);
        if(isset($resul)){
         return $resul->nombre;
        }
        else
        {
          return "sin definir";
        }
        
      }





}