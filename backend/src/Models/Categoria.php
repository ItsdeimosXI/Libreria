<?php

declare(strict_types=1);

namespace Raiz\Models;

use Raiz\Models\ModelBase;

class Categoria extends ModelBase
{
    private string $descripcion;
    private int $activo;
    public function __construct(string $descripcion, int $activo)
    {
        $this->activo = $activo;
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
    
}
