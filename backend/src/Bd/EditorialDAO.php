<?php

namespace Raiz\Bd;

use Raiz\Aux\Serializador;
use Raiz\Bd\InterfaceDAO;
use Raiz\Models\Editorial;


class EditorialDAO implements InterfaceDAO
{

    public static function listar(): array
    {
        $sql = 'SELECT * FROM Editorial';
        $listaEditorial = ConectarBD::leer(sql: $sql);
        $Editorial = [];
        foreach ($listaEditorial as $Editorial) {
            $Editorial[] = Editorial::deserializar($Editorial);
        }
        return $Editorial;
    }
    public static function encontrarUno(string $id): ?Editorial
    {
        $sql = 'SELECT * FROM Editorial WHERE id =:id;';
        $Editorial = ConectarBD::leer(sql: $sql, params: [':id' => $id]);
        if (count($Editorial) === 0) {
           return null;
        } else {
            $Editorial = Editorial::deserializar($Editorial[0]);
            return $Editorial;
        }
    }

    public static function crear(Serializador $instancia): void
    {
        $params = $instancia->serializar();
        $sql = 'INSERT INTO Editorial (id, nombre, activo) VALUES (:id, :nombre, :activo)';
        ConectarBD::escribir(
            sql: $sql,
            params: [
                ':id' => $params['id'],
                ':nombre' => $params['nombre'],
                ':activo' => $params['activo']
            ]
        );
    }

    public static function actualizar(Serializador $instancia): void
    {
        $params = $instancia->serializar();
        $sql = 'UPDATE Editorial SET nombre =:nombre WHERE id=:id';
        ConectarBD::escribir(
            sql: $sql,
            params: [
                ':id' => $params['id'],
                ':nombre' => $params['nombre'],
            ]
        );
    }
    public static function borrar(string $id)
    {
        $sql = 'DELETE FROM Editorial WHERE id=:id';
        ConectarBD::escribir(sql: $sql, params: [':id' => $id]);
    }
}
