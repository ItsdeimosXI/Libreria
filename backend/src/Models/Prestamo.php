<?php

declare(strict_types=1);

namespace Raiz\Models;

class Prestamo extends ModelBase
{
    /** @var Socio */
    private Socio $socio;
    /** @var Libro */
    private Libro $libro;
    private  $fecha_desde;
    private  $fecha_hasta;
    private  $fecha_dev;
    public function __construct(Socio $socio, Libro $libro, string $fecha_desde, string $fecha_hasta, $fecha_dev = null)
    {
        $this->socio = $socio;
        $this->libro = $libro;
        $this->fecha_desde =  date_create($fecha_desde);
        $this->fecha_hasta = date_create($fecha_hasta);
        $this->fecha_dev = $fecha_dev === null ? null : date_create($fecha_dev);
    }
    public function GetSoscio()
    {
        return $this->socio;
    }
    public function SetSocio(Socio $socio)
    {
        $this->socio = $socio;
    }
    public function GetLibro()
    {
        return $this->libro;
    }
    public function SetLibro(Libro $libro)
    {
        $this->libro = $libro;
    }
    public function GetFechaDesde()
    {
        return $this->fecha_desde;
    }
    public function SetFechaDesde($fecha_desde)
    {
        $this->fecha_desde = $fecha_desde;
    }
    public function GetFechaHasta()
    {
        return $this->fecha_hasta;
    }
    public function SetFechaHasta($fecha_hasta)
    {
        $this->fecha_hasta = $fecha_hasta;
    }
    public function GetFechaDev()
    {
        $this->fecha_dev;
    }
    public function SetFechaDev($fecha_dev)
    {
        $this->fecha_dev = $fecha_dev;
    }
    public function diasderetraso()
    {
        $retraso = $this->GetFechaHasta();
        $actual = date_create("now");
        $diasretraso = date_diff($actual, $retraso);
        if ($actual > $retraso) {
            return "Usted tiene $diasretraso de demora";
        }
    }
    public static function deserializar(array $datos): self
    {
        return new Prestamo(
            socio: $datos["socio"],
            libro: $datos["libro"],
            fecha_desde: $datos["fecha_desde"],
            fecha_hasta: $datos["fecha_hasta"]
        );
    }
    /** @Return mixed[] */
    public function serializar(): array
    {
        $serializar = array(
            "socio" => $this->GetSoscio()->serializar(),
            "libro" => $this->GetLibro()->serializar(),
            "fecha_desde" =>  date_format($this->GetFechaDesde(), "Y-m-d"),
            "fecha_hasta" => date_format($this->GetFechaHasta(), "Y-m-d"),
            "fecha_dev" => $this->GetFechaDev() === null ? null : date_format($this->GetFechaDev(), "Y-m-d")
        );
        return $serializar;
    }
}
