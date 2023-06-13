<?php

namespace Raiz\Bd;

use Raiz\Seri\Serializador;
use Raiz\Bd\InterfaceDAO;
use Raiz\Models\Autor;


class AutorDAO implements InterfaceDAO
{

    public static function listar(): array
    {
        $sql = 'SELECT * FROM autores';
        $listaAutor = ConectarBD::leer(sql: $sql);
        $Autor = [];
        foreach ($listaAutor as $Autor) {
            $Autor[] = Autor::deserializar($Autor);
        }
        return $Autor;
    }
    public static function encontrarUno(string $id): ?Autor
    {
        $sql = 'SELECT * FROM autores WHERE id =:id;';
        $Autor = ConectarBD::leer(sql: $sql, params: [':id' => $id]);
        if (count($Autor) === 0) {
           return null;
        } else {
            $Autor = Autor::deserializar($Autor[0]);
            return $Autor;
        }
    }

    public static function crear(Serializador $instancia): void
    {
        $params = $instancia->serializar();
        $sql = 'INSERT INTO Autor (id, nombre_apellido, activo) VALUES (:id, :nombre_apellido, :activo)';
        ConectarBD::escribir(
            sql: $sql,
            params: [
                ':id' => $params['id'],
                ':nombre_apellido' => $params['nombre_apellido'],
                ':activo' => $params['activo']
            ]
        );
    }

    public static function actualizar(Serializador $instancia): void
    {
        $params = $instancia->serializar();
        $sql = 'UPDATE Autor SET nombre_apellido =:nombre_apellido WHERE id=:id';
        ConectarBD::escribir(
            sql: $sql,
            params: [
                ':id' => $params['id'],
                ':nombre_apellido' => $params['nombre_apellido'],
            ]
        );
    }
    public static function borrar(string $id)
    {
        $sql = 'DELETE FROM Autor WHERE id=:id';
        ConectarBD::escribir(sql: $sql, params: [':id' => $id]);
    }
}
