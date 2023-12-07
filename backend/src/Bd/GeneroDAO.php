<?php

namespace Raiz\Bd;

use Raiz\Seri\Serializador;
use Raiz\Bd\InterfaceDAO;
use Raiz\Models\Genero;


class GeneroDAO implements InterfaceDAO
{

    public static function listar(): array
    {
        $sql = 'SELECT * FROM generos';
        $listagenero = ConectarBD::leer(sql: $sql);
        $genero = [];
        foreach ($listagenero as $Genero) {
            $genero[] = Genero::deserializar($Genero);
        }
        return $genero;
    }
    public static function encontrarUno(string $id): ?Genero
    {
        $sql = 'SELECT * FROM generos WHERE id =:id;';
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
        $sql = 'INSERT INTO generos (descripcion) VALUES (:descripcion)';
        ConectarBD::escribir(
            sql: $sql,
            params: [
                ':descripcion' => $params['descripcion'],
            ]
        );
    }

    public static function actualizar(Serializador $instancia): void
    {
        $params = $instancia->serializar();
        $sql = 'UPDATE generos SET descripcion =:descripcion WHERE id=:id';
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
        $sql = 'DELETE FROM generos WHERE id=:id';
        ConectarBD::escribir(sql: $sql, params: [':id' => $id]);
    }
}
