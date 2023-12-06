<?php
namespace Raiz\Controllers;

use Raiz\Bd\CategoriasDAO;
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
        $listadoCategoria = CategoriasDAO::listar();
        foreach($listadoCategoria as $Categorias){
            $Categoria[] = $Categorias->serializar();
        }
        return $Categoria;

        
    }
    
    public static function encontrarUno(string $id): ?array
    {
        $Categoria = CategoriasDAO::encontrarUno($id);
        if($Categoria===null){
            return $Categoria;
        }else{
            return $Categoria->serializar();
        }
        
        
        
    }

    public static function crear(array $parametros): array
    {
        $Categoria = Categoria::deserializar($parametros);
        CategoriasDAO::crear($Categoria);
        return $Categoria->serializar();
    }

    public static function actualizar(array $parametros): array
    {
        $Categoria = Categoria::deserializar($parametros);
        CategoriasDAO::actualizar($Categoria);
        return $Categoria->serializar();
    }

    public static function borrar(string $id):void
    {
        CategoriasDAO::borrar($id);
        
    }
}