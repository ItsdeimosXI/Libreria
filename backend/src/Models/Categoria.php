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
        return new categoria(
            id: $datos['id'] === null ? 0 : intVal($datos['id']),
            descripcion: $datos["descripcion"]
        );
    }
    /** @Return mixed[] */
    public function serializar(): array
    {
        $serializar = array("descripcion" => $this->GetDescripcion() );
        return $serializar;
    }
}
