<?php

namespace Raiz\Bd;

use Raiz\Seri\Serializador;
use Raiz\Bd\InterfaceDAO;
use Raiz\Models\categoria;


class categoriasDAO implements InterfaceDAO
{

    public static function listar(): array
    {
        $sql = 'SELECT * FROM categorias';
        $listacategorias = ConectarBD::leer(sql: $sql);
        $categorias = [];
        foreach ($listacategorias as $categoria) {
            $categorias[] = categoria::deserializar($categoria);
        }
        return $categorias;
    }
    public static function encontrarUno(string $id): ?categoria
    {
        $sql = 'SELECT * FROM categorias WHERE id =:id;';
        $categorias = ConectarBD::leer(sql: $sql, params: [':id' => $id]);
        if (count($categorias) === 0) {
           return null;
        } else {
            $categorias = categoria::deserializar($categorias[0]);
            return $categorias;
        }
    }

    public static function crear(Serializador $instancia): void
    {
        $params = $instancia->serializar();
        $sql = 'INSERT INTO categorias (id, descripcion, activo) VALUES (:id, :descripcion, :activo)';
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
        $sql = 'UPDATE categorias SET descripcion =:descripcion WHERE id=:id';
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
        $sql = 'DELETE FROM categorias WHERE id=:id';
        ConectarBD::escribir(sql: $sql, params: [':id' => $id]);
    }
}