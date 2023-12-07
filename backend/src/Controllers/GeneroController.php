<?php
namespace Raiz\Controllers;

use Raiz\Bd\GeneroDAO;
use Raiz\Models\Genero;

class GeneroController implements InterfaceController{
   
    //Clase que controla de acuerdo a lo que pida la vista: 
    // --- CRUD --- 
    //  Listar 
    //  encontrar uno
    //  crear
    //  actualizar
    //  borrar  
    public static function listar(): array
    {
        $listadoGeneros = []; // Cambiado el nombre de la variable para evitar conflictos
        $listadoGenero = GeneroDAO::listar();
        foreach($listadoGenero as $genero){ // Cambiado el nombre de la variable
            $listadoGeneros[] = $genero->serializar(); // Utilizando la nueva variable
        }
        return $listadoGeneros; // Devolviendo la nueva variable
    }
    
    public static function encontrarUno(string $id): ?array
    {
        $Genero = GeneroDAO::encontrarUno($id);
        if($Genero===null){
            return $Genero;
        }else{
            return $Genero->serializar();
        } 
    }

    public static function crear(array $parametros): array
    {
        $Genero = Genero::deserializar($parametros);
        GeneroDAO::crear($Genero);
        return $Genero->serializar();
    }

    public static function actualizar(array $parametros): array
    {
        $Genero = Genero::deserializar($parametros);
        GeneroDAO::actualizar($Genero);
        return $Genero->serializar();
    }

    public static function borrar(string $id):void
    {
        GeneroDAO::borrar($id);
        
    }
}