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
    private string $fecha_dev;
    public function __construct()
    {
        
    }


}