<?php
declare(strict_types=1);
namespace Raiz\Models;

class Prestamo extends ModelBase{
    /** @var Socio */
    private Socio $socio;
    /** @var Libro */
    private Libro $libro;
    private string $fecha_desde;
    private string $fecha_hasta;
    private ?string $fecha_dev;
    public function __construct(Socio $socio, Libro $libro, string $fecha_desde, string $fecha_hasta)
    {
        $this->socio = $socio;
        $this->libro = $libro;
        $this->fecha_desde = $fecha_desde;
        $this->fecha_hasta = $fecha_hasta;
        $this->fecha_dev = null;
    }
    public function GetSoscio(){
        return $this->socio;
    }
    public function SetSocio(Socio $socio){
        $this->socio = $socio;
    }
    public function GetLibro(){
        return $this->libro;
    }
    public function SetLibro(Libro $libro){
        $this->libro = $libro;
    }
    public function GetFechaDesde(){
        $this->fecha_desde;
    }
    public function SetFechaDesde($fecha_desde){
        $this->fecha_desde = $fecha_desde;
    }
    public function GetFechaHasta(){
        $this->fecha_hasta;
    }
    public function SetFechaHasta($fecha_hasta){
        $this->fecha_hasta = $fecha_hasta;
    }
    public function GetFechaDev(){
        $this->fecha_dev;
    }
    public function SetFechaDev($fecha_dev){
        $this->fecha_dev = $fecha_dev;
    }
}