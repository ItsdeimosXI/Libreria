<?php

declare(strict_types=1);

namespace Raiz\Models;


class Socio extends ModelBase
{
    private string  $nombre_apellido;
    private   string $fecha_alta;
    private int $activo;
    private int $telefono;
    private string $direccion;

    public function __construct(
        int $id,
        string  $nombre_apellido,
        string $fecha_alta,
        int $activo,
        int $telefono,
        string $direccion
    ) {
        parent::__construct($id);
        $this->nombre_apellido = $nombre_apellido;
        $this->telefono = $telefono;
        $this->fecha_alta = $fecha_alta;
        $this->activo = $activo;
        $this->direccion = $direccion;
    }
    public function Setnombreapellido(string $Nombre_apellido)
    {
        $this->nombre_apellido = $Nombre_apellido;
    }
    public function Getnombre()
    {
        return $this->nombre_apellido;
    }
    public function SetDireccion(string $direccion)
    {
        $this->direccion = $direccion;
    }
    public function GetDireccion()
    {
        return $this->direccion;
    }
    public function SetTelefono(int $telefono): void
    {
        $this->telefono = $telefono;
    }
    public function getTelefono()
    {
        return $this->telefono;
    }


    public function setFechaAlta(string $fecha)
    {

        return $this->fecha_alta;
    }
    public function getFechaAlta()
    {
        return $this->fecha_alta;
    }

    public function getEsActivo()
    {
        return $this->activo;
    }
    public function SetEsactivo(int $activo)
    {
        $this->activo = $activo;
    }

    public static function deserializar(array $datos): self
    {
        return new socio(
            id: $datos['id'] === null ? 0 : intVal($datos['id']),
            activo: intVal($datos["activo"]),
            fecha_alta: $datos["fecha_alta"],
            nombre_apellido: $datos["nombre_apellido"],
            direccion: $datos["direccion"],
            telefono: intVal($datos["telefono"])
        );
    }
    /** @Return mixed[] */
    public function serializar(): array
    {
        $serializar = array(
            'id'=>$this->getId(),
            "nombre_apellido" => $this->Getnombre(), 
            "activo" => $this->GetEsactivo(), 
            "fecha_alta" => $this->Getfechaalta(), 
            "telefono" => $this->GetTelefono(), 
            "direccion" => $this->GetDireccion()
        );
        return $serializar;
    }
}
