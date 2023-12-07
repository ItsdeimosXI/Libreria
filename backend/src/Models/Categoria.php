<?php

declare(strict_types=1);

namespace Raiz\Models;

use Raiz\Models\ModelBase;

class Categoria extends ModelBase
{
    private string $descripcion;

    public function __construct(string $descripcion, int $id)
    {
        parent::__construct($id);
    
        $this->descripcion = $descripcion;
    }
    public function GetDescripcion()
    {
        return $this->descripcion;
    }
    public function SetDescripcion(string $descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public static function deserializar(array $datos): self
    {
        $id = isset($datos['id']) ? intval($datos['id']) : 0;
        $descripcion = isset($datos['descripcion']) ? $datos['descripcion'] : '';
    
        return new Categoria(
            descripcion: $descripcion,
            id: $id
        );
    }
    /** @Return mixed[] */
    public function serializar(): array
    {
        $serializar = array("descripcion" => $this->GetDescripcion(), "id" => $this->getId());
        return $serializar;
    }
}
