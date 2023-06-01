<?php
namespace Raiz\Controllers;

use Raiz\Bd\EditorialDAO;
use Raiz\Models\Editorial;

class EditorialController implements InterfaceController{
   
    //Clase que controla de acuerdo a lo que pida la vista: 
    // --- CRUD --- 
    //  Listar 
    //  encontrar uno
    //  crear
    //  actualizar
    //  borrar  

    public static function listar(): array
    {
        $Editorial = [];
        $listadoEditorial = EditorialDAO::listar();
        foreach($listadoEditorial as $Editorial){
            $Editorial[] = $Editorial->serializar();
        }
        return $Editorial;

        
    }
    
    public static function encontrarUno(string $id): ?array
    {
        $Editorial = EditorialDAO::encontrarUno($id);
        if($Editorial===null){
            return $Editorial;
        }else{
            return $Editorial->serializar();
        }
        
        
        
    }

    public static function crear(array $parametros): array
    {
        $Editorial = Editorial::deserializar($parametros);
        EditorialDAO::crear($Editorial);
        return $Editorial->serializar();
    }

    public static function actualizar(array $parametros): array
    {
        $Editorial = Editorial::deserializar($parametros);
        EditorialDAO::actualizar($Editorial);
        return $Editorial->serializar();
    }

    public static function borrar(string $id):void
    {
        EditorialDAO::borrar($id);
        
    }
}