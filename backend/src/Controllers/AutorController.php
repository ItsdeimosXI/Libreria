<?php
namespace Raiz\Controllers;

use Raiz\Bd\AutorDAO;
use Raiz\Models\Autor;

class AutorController implements InterfaceController{
   
    //Clase que controla de acuerdo a lo que pida la vista: 
    // --- CRUD --- 
    //  Listar 
    //  encontrar uno
    //  crear
    //  actualizar
    //  borrar  

    public static function listar(): array
    {
        $Autor = [];
        $listadoAutor = AutorDAO::listar();
        foreach($listadoAutor as $Autor){
            $Autor[] = $Autor->serializar();
        }
        return $Autor;

        
    }
    
    public static function encontrarUno(string $id): ?array
    {
        $Autor = AutorDAO::encontrarUno($id);
        if($Autor===null){
            return $Autor;
        }else{
            return $Autor->serializar();
        }
        
        
        
    }

    public static function crear(array $parametros): array
    {
        $Autor = Autor::deserializar($parametros);
        AutorDAO::crear($Autor);
        return $Autor->serializar();
    }

    public static function actualizar(array $parametros): array
    {
        $Autor = Autor::deserializar($parametros);
        AutorDAO::actualizar($Autor);
        return $Autor->serializar();
    }

    public static function borrar(string $id):void
    {
        AutorDAO::borrar($id);
        
    }
}