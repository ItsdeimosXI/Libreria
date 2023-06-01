<?php

namespace Raiz\Bd;

use Raiz\Aux\Serializador;
use Raiz\Bd\InterfaceDAO;
use Raiz\Models\Categoria;


class CategoriaDAO implements InterfaceDAO
{

    public static function listar(): array
    {
        $sql = 'SELECT * FROM Categoria';
        $listaCategoria = ConectarBD::leer(sql: $sql);
        $Categoria = [];
        foreach ($listaCategoria as $Categoria) {
            $Categoria[] = Categoria::deserializar($Categoria);
        }
        return $Categoria;
    }
    public static function encontrarUno(string $id): ?Categoria
    {
        $sql = 'SELECT * FROM Categoria WHERE id =:id;';
        $Categoria = ConectarBD::leer(sql: $sql, params: [':id' => $id]);
        if (count($Categoria) === 0) {
           return null;
        } else {
            $Categoria = Categoria::deserializar($Categoria[0]);
            return $Categoria;
        }
    }

    public static function crear(Serializador $instancia): void
    {
        $params = $instancia->serializar();
        $sql = 'INSERT INTO Categoria (id, descripcion, activo) VALUES (:id, :descripcion, :activo)';
        ConectarBD::escribir(
            sql: $sql,
            params: [
                ':id' => $params['id'],
                ':descripcion' => $params['descripcion'],
                ':activo' => $params['activo']
            ]
        );
    }

    public static function actualizar(Serializador $instancia): void
    {
        $params = $instancia->serializar();
        $sql = 'UPDATE Categoria SET descripcion =:descripcion WHERE id=:id';
        ConectarBD::escribir(
            sql: $sql,
            params: [
                ':id' => $params['id'],
                ':descripcion' => $params['descripcion'],
            ]
        );
    }
    public static function borrar(string $id)
    {
        $sql = 'DELETE FROM Categoria WHERE id=:id';
        ConectarBD::escribir(sql: $sql, params: [':id' => $id]);
    }
}