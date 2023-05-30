<?php
declare(strict_types=1);
namespace Raiz\Models;

class Libro extends ModelBase{
   private string $titulo;
   /** @var Editorial */
   private Editorial $editorial;
    
   private array $autor;
     /** @var Genero */
   private  Genero $genero;
    
   private int $cant_paginas;
    
   private int $anio_publicacion;
   public function __construct(string $titulo, Editorial $editorial, array $autor, Genero $genero, int $cant_paginas, int $anio_publicacion)
   {
    $this->titulo = $titulo;
    $this-> editorial = $editorial;
    $this->autor = $autor;
    $this->genero = $genero;
    $this->cant_paginas = $cant_paginas;
    $this-> anio_publicacion = $anio_publicacion;
   }
}

