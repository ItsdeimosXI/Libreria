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
   const ACTIVO = 'Activo' ;
   const  PRESTADO = ' Prestado' ;
   const INACTIVO = 'Inactivo'; 
   private string $estado;
   public function __construct(string $titulo, Editorial $editorial, array $autor, Genero $genero, int $cant_paginas, int $anio_publicacion, string $estado)
   {
    $this->titulo = $titulo;
    $this-> editorial = $editorial;
    $this->autor = $autor;
    $this->genero = $genero;
    $this->cant_paginas = $cant_paginas;
    $this-> anio_publicacion = $anio_publicacion;
    $this->estado = static::ACTIVO;
   }
   public function GetTitulo(){
      return $this->titulo;
   }
   public function SetTitulo( string $titulo){
      $this->titulo = $titulo;
   }
   public function GetEditorial(){
      return $this->editorial;
   }
   public function SetEditorial( Editorial $editorial){
      $this->editorial = $editorial;
   }
   public function GetAutor(){
      return $this->autor;
   }
   public function SetAutor( array $autor){
      $this->autor = $autor;
   }
   public function GetGenero(){
      return $this->genero;
   }
   public function SetGenero( Genero $genero){
      $this->genero = $genero;
   }
   public function GetCantPag(){
      return $this->cant_paginas;
   }
   public function SetCantPag( int $cant_paginas){
      $this->cant_paginas = $cant_paginas;
   }
   public function GetAnioPublic(){
      return $this->anio_publicacion;
   }
   public function SetAnioPublic( int $anio_publicacion){
      $this->anio_publicacion = $anio_publicacion;
   }
   public function GetEstado(){
      return $this->estado;
   }
   public function SetEstado($estado){
      $this->estado = $estado;
   }
   public static function deserializar(array $datos): self
   {
       return new Libro(
           titulo: $datos["titulo"],
           editorial: $datos["editorial"],
           autor: $datos["autor"],
           genero: $datos["genero"],
       cant_paginas: $datos["cantpaginas"],
       anio_publicacion: $datos["año_publicacion"],
       estado: $datos["estado"]
       );
   }
   /** @Return mixed[] */
   public function serializar(): array
   {
       $serializar = array("titulo" => $this->GetTitulo(), "editorial" => $this->GetEditorial(), "autor" => $this->GetAutor(), "genero" => $this->GetGenero(), "cant_paginas" => $this->GetCantPag(), "año_publicacion" => $this->GetAnioPublic(), "estado" => $this->GetEstado());
       return $serializar;
   }
}

