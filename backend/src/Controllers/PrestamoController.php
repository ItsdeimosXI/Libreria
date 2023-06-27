<?php
namespace Raiz\Controllers;

use Raiz\Bd\PrestamoDAO;
use Raiz\Models\Prestamo;

class PrestamoController implements InterfaceController{
   
    //Clase que controla de acuerdo a lo que pida la vista: 
    // --- CRUD --- 
    //  Listar 
    //  encontrar uno
    //  crear
    //  actualizar
    //  borrar  

    public static function listar(): array
    {
        $Prestamos = [];
        $listadoPrestamo = PrestamoDAO::listar();
        foreach($listadoPrestamo as $Prestamo){
            $Prestamos[] = $Prestamo->serializar();
        }
        return $Prestamos;

        
    }
    
    public static function encontrarUno(string $id): ?array
    {
        $Prestamo = PrestamoDAO::encontrarUno($id);
        if($Prestamo===null){
            return $Prestamo;
        }else{
            return $Prestamo->serializar();
        }
        
    }

    public static function crear(array $parametros): array
    {
        $Prestamo = Prestamo::deserializar($parametros);
        PrestamoDAO::crear($Prestamo);
        return $Prestamo->serializar();
    }

    public static function actualizar(array $parametros): array
    {
        $Prestamo = Prestamo::deserializar($parametros);
        PrestamoDAO::actualizar($Prestamo);
        return $Prestamo->serializar();
    }

    public static function borrar(string $id):void
    {
        PrestamoDAO::borrar($id);
        
    }
    public static function verificarLibroDevuelvo(){

    }

    public static function calcularDiasRetraso( ){
        
    }
}