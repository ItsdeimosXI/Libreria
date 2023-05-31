<?php

declare(strict_types=1);
namespace Raiz\Models;
use Raiz\Models\ModelBase;


class Autor extends ModelBase{
    private string $nombre_apellido;
    private int $activo;
    public function __construct(string $nombre_apellido
    , int $activo)
    {
        $this->nombre_apellido = $nombre_apellido;
        $this->activo = $activo;
    }
    public function Setnombreapellido( string $Nombre_apellido){
        $this->nombre_apellido = $Nombre_apellido;
        return $this->nombre_apellido;
    }
    public function Getnombre()
    {
        return $this->nombre_apellido;
    }
    public function GetEsactivo()
    {
        return $this->activo;
    }
    public function SetEsactivo(int $activo)
    {
        $this->activo = $activo;
    }
    public static function deserializar(array $datos): self
    {
        return new autor(
            activo: $datos["activo"],
            nombre_apellido: $datos["nombre_apellido"]
        );
    }
    /** @Return mixed[] */
    public function serializar(): array
    {
        $serializar = array("nombre_apellido" => $this->Getnombre(), "activo" => $this->GetEsactivo() );
        return $serializar;
    }
}