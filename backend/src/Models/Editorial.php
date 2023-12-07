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

    public static function deserializar(array $datos): self
    {
        $id = isset($datos['id']) ? intval($datos['id']) : 0;
        $nombre = isset($datos['nombre']) ? $datos['nombre'] : '';
    
        return new Editorial(
            nombre: $nombre,
            id: $id
        );
    }
    /** @Return mixed[] */
    public function serializar(): array
    {
        $serializar = array("nombre" => $this->Getnombre(), "id" => $this->getId());
        return $serializar;
    }
}