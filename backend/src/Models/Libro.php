<?php

namespace Raiz\Models;

//use Error;

class Libro extends ModelBase
{

    private $titulo;
    /** @var Editorial */
    private $editorial;
    /** @var array array<Autor> */
    private array $autor;
    /** @var Genero */
    private $genero;
    /** @var Categoria */
    private $categoria;
    private $cant_paginas;
    private $anio;
    private $estado;
    const ACTIVO = 'Activo';
    const INACTIVO = 'Inactivo';
    const PRESTADO = 'Prestado';

    public function __construct(
        $id,
        string $titulo,
        array $autorList,
        Editorial $editorial,
        int $cant_paginas,
        int $anio,
        Genero $genero,
        Categoria $categoria,
        string $estado = self::ACTIVO

    ) {
        parent::__construct($id);
        $this->titulo = $titulo;
        $this->editorial = $editorial;
        $this->autor=$autorList;
        $this->genero = $genero;
        $this->cant_paginas = $cant_paginas;
        $this->anio = $anio;
        $this->categoria = $categoria;
        $this->estado = $estado;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }
    public function getGenero(): Genero
    {
        return $this->genero;
    }
    public function getEditorial(): Editorial
    {
        return $this->editorial;
    }
    public function getCategoria(): Categoria
    {
        return $this->categoria;
    }
    public function getCant_Pag(): int
    {
        return $this->cant_paginas;
    }
    public function getAnio_Pub(): int
    {
        return $this->titulo;
    }
    public function getAutores(): array
    {
        $listaAutores =[];
        foreach($this->autor as $autores){
            $listaAutores[] = $autores->serializar();
        }
        return $listaAutores;
        
    }
    public function getEstado(): string
    {
        return $this->estado;
    }
    //---- Setters ----//
    public function setTitulo(string $nuevoTitulo)
    {
        $this->titulo = $nuevoTitulo;
    }

    public function setAutor(array $nuevoAutorList)
    {
        foreach ($nuevoAutorList as $autor) {
            $this->autor[] = $autor;
        }
    }

    public function setCategoria(Categoria $nuevaCategoria)
    {
        $this->categoria = $nuevaCategoria;
    }

    public function setGenero(Categoria $nuevoGenero)
    {
        $this->genero = $nuevoGenero;
    }

    public function setEditorial(Editorial $nuevaEditorial)
    {
        $this->editorial = $nuevaEditorial;
    }

    public function setCantPaginas(int $nuevaCantidadPaginas)
    {
        $this->cant_paginas = $nuevaCantidadPaginas;
    }

    public function setEstado($nuevoEstado)
    {
        switch ($nuevoEstado) {
            case $nuevoEstado === static::ACTIVO:
                $this->estado = static::ACTIVO;
                break;
            case $nuevoEstado === static::INACTIVO:
                $this->estado = static::INACTIVO;
                break;
            case $nuevoEstado === static::PRESTADO:
                $this->estado = static::PRESTADO;
        }
    }
    public function serializarAutores(): array
    {
        $autor = [];
        foreach ($this->autor as $autores){
            $autor[] = $autores->serializar();
        }
        return $autores;
    }

    public function serializar(): array
    {
        return [
            'id' => $this->getId(),
            'titulo' => $this->titulo,
            'autor' => $this->getAutores(),
            'editorial' => $this->editorial->serializar(),
            'cant_paginas' => $this->cant_paginas,
            'genero' => $this->genero->serializar(),
            'categoria' => $this->categoria->serializar(),
            'estado' => $this->estado,
            'anio'=>$this->anio
        ];
    }
    static function deserializar(array $parametros): ModelBase
    {
        return new Self(
            id: $parametros['id'],
            titulo: $parametros['titulo'],
            autorList: $parametros['autor'],
            editorial: $parametros['editorial'],
            cant_paginas: $parametros['cant_paginas'],
            anio: $parametros['anio'],
            genero: $parametros['genero'],
            categoria: $parametros['categoria'],
            estado: $parametros['estado']
        );
    }
}
