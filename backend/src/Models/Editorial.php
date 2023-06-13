<?php
declare(strict_types=1);
namespace Raiz\Models;

class Editorial extends ModelBase{
    private string $nombre;

    public function __construct(string $nombre, int $id)
    {
        parent::__construct($id);
        $this->nombre = $nombre;

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
    public static function deserializar(array $datos): self
    {
        return new Editorial(
            id: $datos['id'] === null ? 0 : intVal($datos['id']),
            nombre: $datos["nombre"]
        );
    }
    /** @Return mixed[] */
    public function serializar(): array
    {
        $serializar = array("nombre_apellido" => $this->Getnombre() );
        return $serializar;
    }
}