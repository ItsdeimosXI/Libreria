<?php

declare(strict_types=1);
namespace Raiz\Models;
use Raiz\Models\ModelBase;


class Autor extends ModelBase{
    private string $nombre_apellido;

    public function __construct(string $nombre_apellido
    , int $id)
    {
        parent::__construct($id);
        $this->nombre_apellido = $nombre_apellido;

    }
    public function Setnombreapellido( string $Nombre_apellido){
        $this->nombre_apellido = $Nombre_apellido;
        return $this->nombre_apellido;
    }
    public function Getnombre()
    {
        return $this->nombre_apellido;
    }
 
    public static function deserializar(array $datos): self
    {
        $id = isset($datos['id']) ? intval($datos['id']) : 0;
        $nombre_apellido = isset($datos['nombre_apellido']) ? $datos['nombre_apellido'] : '';
    
        return new Autor(
            nombre_apellido: $nombre_apellido,
            id: $id
        );
    }
    /** @Return mixed[] */
    public function serializar(): array
    {
        $serializar = array("nombre_apellido" => $this->Getnombre(), 'id' => $this->getId());
        return $serializar;
    }
}