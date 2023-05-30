<?php

declare(strict_types=1);

namespace Raiz\Models;


class Socio extends Persona
{
    private string  $nombre_apellido;
    private   string $fecha_alta;
    private int $activo;
    private int $telefono;
    private string $direccion;
    private int $dni;
    public function __construct(
        string  $nombre_apellido,
        string $fecha_alta,
        int $activo,
        int $dni,
        int $telefono,
        string $direccion
    ) {
        parent::__construct($nombre_apellido, $dni);
        $this->telefono = $telefono;
        $this->fecha_alta = $fecha_alta;
        $this->activo = $activo;
        $this->direccion = $direccion;
    }
    public function Setnombreapellido( string $Nombre_apellido){
        $this->nombre_apellido = $Nombre_apellido;
        return $this->nombre_apellido;
    }
    public function Getnombre()
    {
        return $this->nombre_apellido;
    }
    public function SetDireccion( string $direccion){
        $this->direccion = $direccion;
        return $this->direccion;
    }
    public function GetDireccion()
    {
        return $this->direccion;
    }
    public function SetTelefono( int $telefono){
        $this->telefono = $telefono;
        return $this->telefono;
    }
    public function GetTelefono()
    {
        return $this->telefono;
    }
    
    public function SetDNI( int $dni){
        $this->dni = $dni;
        return $this->fecha_alta;
    }
    public function GetDNI()
    {
        return $this->dni;
    }
    public function setFechaAlta( string $fecha){
        $this->fecha_alta = $fecha;
        return $this->fecha_alta;
    }
    public function Getfechaalta()
    {
        return $this->fecha_alta;
    }

    public function GetEsactivo()
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
            activo: $datos["activo"],
            fecha_alta: $datos["fecha_alta"],
            dni: $datos["dni"],
            nombre_apellido: $datos["nombre_apellido"],
            direccion: $datos["direccion"],
            telefono: $datos["telefono"]
        );
    }
    /** @Return mixed[] */
    public function serializar(): array
    {
        $serializar = array("dni" => $this->GetDni(), "nombre" => $this->Getnombre(), "Activo" => $this->GetEsactivo(), "Fecha alta" => $this->Getfechaalta(), "Telefono" => $this->GetTelefono(), "Direccion" => $this->GetDireccion());
        return $serializar;
    }
}
