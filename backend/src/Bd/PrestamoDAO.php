<?php

namespace Raiz\Bd;
use Raiz\Models\prestamo;
use Raiz\Seri\Serializador;
use PDO;

class PrestamoDAO implements InterfaceDAO
{
    public static function listar(): array
    {
        
        $sql = 'SELECT *  FROM  prestamos';
        $cnx = ConectarBD::conectar();
        $consulta = $cnx->prepare($sql);
        $consulta->execute();
        $listaprestamos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $prestamos = [];
        foreach ($listaprestamos as $prestamo) {
            $prestamo['socio'] = SocioDAO::encontrarUno($prestamo['id_socio']);
            $prestamo['prestamo'] = prestamoDAO::encontrarUno($prestamo['id_prestamo']);
            $prestamos[] = prestamo::deserializar($prestamo);
        }
        
        return $prestamos;
    }
    public static function BuscarPrestamos($id)
    {
        $sql = 'SELECT id_socio FROM autores_prestamos WHERE id_prestamo =:id;';
        $autores = ConectarBD::leer(sql: $sql, params: [':id' => $id]);
        
        if (count($autores) === 0) {
            return null;
        } else {
            return $autor[] =  AutorDAO::encontrarUno($autores[0]["id_socio"]);
            
        }
    }

    public static function encontrarUno(string $id): ?prestamo
    {
        $sql = 'SELECT * FROM prestamos WHERE id =:id;';
        $prestamo = ConectarBD::leer(sql: $sql, params: [':id' => $id]);
        if (count($prestamo) === 0) {
            return null;
        } else {
            
            $prestamo[0]['genero'] = GeneroDAO::encontrarUno($prestamo[0]['id_genero']);
            $prestamo[0]['editorial'] = EditorialDAO::encontrarUno($prestamo[0]['id_editorial']);
            $autoresprestamos[] = static::BuscarPrestamos($prestamo[0]["id"]);
           
            foreach ($autoresprestamos as $autor) {
                $prestamo[0]["autor"][] = $autor;
            }
            
            $prestamo = prestamo::deserializar($prestamo[0]);
            return $prestamo;
        }
    }

    public static function crear(Serializador $instancia): void
    {
        $params = $instancia->serializar();
        $sql = 'INSERT INTO prestamo (titulo, id_genero, id_categoria, cant_paginas, anio, estado, id_editorial) 
        VALUES (:titulo, :id_genero, :id_categoria, :cant_paginas, :anio, :estado, :id_editorial);';
        ConectarBD::escribir(
            sql: $sql,
            params: [
                ':titulo' => $params['titulo'],
                ':id_genero' => $params['genero']->getId(),
                ':id_categoria' => $params['categoria']->getId(),
                ':cant_paginas' => $params['cant_paginas'],
                ':anio' => $params['anio'],
                ':estado' => $params['estado'],
                ':id_editorial' => $params['editorial']->getId(),
            ]
        );
        
        foreach ($params['autor'] as $autor) {
            $sql = 'INSERT INTO autores_prestamos (id_autor, id_prestamo) 
            VALUES ( :id_autor, :id_prestamo)';
            ConectarBD::escribir(
                sql: $sql,
                params: [
                    ':id_prestamo' => static::buscarUltimoprestamo(),
                    ':id_autor' => $autor[0],
                ]
            );
        }
    }

    public static function actualizar(Serializador $instancia): void
    {
        $params = $instancia->serializar();
        $sql = 'UPDATE prestamos SET nombre =:nombre WHERE id=:id';
        ConectarBD::escribir(
            sql: $sql,
            params: [
                ':id' => $params['id'],
                ':nombre' => $params['nombre'],
            ]
        );
    }
    public static function buscarUltimoprestamo():int{
        $sql = 'SELECT MAX(id) as id FROM prestamos ';
        $cnx = ConectarBD::conectar();
        $consulta = $cnx->prepare($sql);
        ConectarBD::escribir(
            sql: $sql,
            params: []
        );
        $consulta = $cnx->prepare($sql);
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_ASSOC)[0]["id"];
       



    }
    public static function actualizarEstado(Serializador $instancia): void
    {
        $params = $instancia->serializar();
        $sql = 'UPDATE prestamos SET estado =:estado WHERE id=:id';
        ConectarBD::escribir(
            sql: $sql,
            params: [
                ':id' => $params['id'],
                ':estado' => $params['estado'],
            ]
        );
    }
    public static function borrar(string $id)
    {
        $sql = 'DELETE FROM prestamos WHERE id=:id';
        ConectarBD::escribir(sql: $sql, params: [':id' => $id]);
    }
}
