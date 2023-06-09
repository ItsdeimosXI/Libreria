<?php

namespace Raiz\Bd;

use Raiz\Aux\Serializador;
use Raiz\Bd\InterfaceDAO;
use Raiz\Models\Genero;


class GeneroDAO implements InterfaceDAO
{

    public static function listar(): array
    {
        $sql = 'SELECT * FROM genero';
        $listagenero = ConectarBD::leer(sql: $sql);
        $genero = [];
        foreach ($listagenero as $Genero) {
            $genero[] = Genero::deserializar($Genero);
        }
        return $genero;
    }
    public static function encontrarUno(string $id): ?Genero
    {
        $sql = 'SELECT * FROM genero WHERE id =:id;';
        $Genero = ConectarBD::leer(sql: $sql, params: [':id' => $id]);
        if (count($Genero) === 0) {
           return null;
        } else {
            $Genero = Genero::deserializar($Genero[0]);
            return $Genero;
        }
    }

    public static function crear(Serializador $instancia): void
    {
        $params = $instancia->serializar();
        $sql = 'INSERT INTO genero (descripcion, activo) VALUES (:descripcion, :activo)';
        ConectarBD::escribir(
            sql: $sql,
            params: [
                ':descripcion' => $params['descripcion'],
                ':activo' => $params['activo']
            ]
        );
    }

    public static function actualizar(Serializador $instancia): void
    {
        $params = $instancia->serializar();
        $sql = 'UPDATE genero SET nombre =:nombre WHERE id=:id';
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
        $sql = 'DELETE FROM genero WHERE id=:id';
        ConectarBD::escribir(sql: $sql, params: [':id' => $id]);
    }
}
