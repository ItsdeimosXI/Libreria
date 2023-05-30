<?php
declare(strict_types=1);
namespace Raiz\Models;

class Editorial extends ModelBase{
    private string $nombre;
    private int $activo;
    public function __construct(string $nombre, int $activo)
    {
        $this->nombre = $nombre;
        $this->activo = $activo;
    }
    public function GetNombre()
    {
        return $this->nombre;
    }
    public function SetNombre(string $nombre)
    {
        $this->nombre = $nombre;
    }
    public function GetEsactivo()
    {
        return $this->activo;
    }
    public function SetEsactivo(int $activo)
    {
        $this->activo = $activo;
    }
}