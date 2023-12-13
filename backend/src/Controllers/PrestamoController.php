<?php
namespace Raiz\Controllers;

use Raiz\Bd\LibroDAO;
use Raiz\Bd\PrestamoDAO;
use Raiz\Bd\SocioDAO;
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
        $socioID = $parametros['socio'];
        $libroID = $parametros['libro'];
        

        $socioDeserializado= SocioDAO::encontrarUno($socioID);
        $libroDeserializado= LibroDAO::encontrarUno($libroID);

        $parametros['socio'] = $socioDeserializado;
        $parametros['libro'] = $libroDeserializado;

        $prestamo = Prestamo::deserializar($parametros);

        PrestamoDAO::crear($prestamo);
        return $prestamo->serializar();
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
    public static function verificarLibroDevuelto(string $id): bool {
        $prestamo = PrestamoDAO::encontrarUno($id);
        if ($prestamo === null) {
            return false;
        }
        
        return $prestamo->getFechaDev() !== null;
    }

    public static function calcularDiasRetraso(string $id): int {
        $prestamo = PrestamoDAO::encontrarUno($id);
        if ($prestamo === null) {
            return 0;
        }
    
        return $prestamo->diasderetraso();
    }
}