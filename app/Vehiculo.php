<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    public $timestamps = false;
    protected $fillable = ['placa', 'tipo', 'modelo'];
    public function ingreso_vehiculo()
    {
        return $this->hasManythrough(Ticket::class, Ingreso_Vehiculo::class);
    }
}
