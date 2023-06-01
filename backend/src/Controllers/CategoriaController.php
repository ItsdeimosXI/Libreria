<?php
namespace Raiz\Controllers;

use Raiz\Bd\CategoriaDAO;
use Raiz\Models\Categoria;

class CategoriaController implements InterfaceController{
   
    //Clase que controla de acuerdo a lo que pida la vista: 
    // --- CRUD --- 
    //  Listar 
    //  encontrar uno
    //  crear
    //  actualizar
    //  borrar  

    public static function listar(): array
    {
        $Categoria = [];
        $listadoCategoria = CategoriaDAO::listar();
        foreach($listadoCategoria as $Categoria){
            $Categoria[] = $Categoria->serializar();
        }
        return $Categoria;

        
    }
    
    public static function encontrarUno(string $id): ?array
    {
        $Categoria = CategoriaDAO::encontrarUno($id);
        if($Categoria===null){
            return $Categoria;
        }else{
            return $Categoria->serializar();
        }
        
        
        
    }

    public static function crear(array $parametros): array
    {
        $Categoria = Categoria::deserializar($parametros);
        CategoriaDAO::crear($Categoria);
        return $Categoria->serializar();
    }

    public static function actualizar(array $parametros): array
    {
        $Categoria = Categoria::deserializar($parametros);
        CategoriaDAO::actualizar($Categoria);
        return $Categoria->serializar();
    }

    public static function borrar(string $id):void
    {
        CategoriaDAO::borrar($id);
        
    }
}