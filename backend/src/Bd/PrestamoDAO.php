<?php

namespace Raiz\Bd;
use Raiz\Models\prestamo;
use Raiz\Seri\Serializador;
use PDO;
use Raiz\Models\Libro;

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
            $prestamo['libro'] = LibroDAO::encontrarUno($prestamo['id_libro']);
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
        $sql = 'INSERT INTO prestamos (id_socio , id_libro, fecha_desde, fecha_hasta, fecha_dev) 
        VALUES (:socio, :libro, :fecha_desde, :fecha_hasta, :fecha_dev);';
        ConectarBD::escribir(
            sql: $sql,
            params: [
                ':socio' => $params['socio']['id'],
                ':libro' => $params['libro']['id'],
                ':fecha_desde' => $params['fecha_desde'],
                ':fecha_hasta' => $params['fecha_hasta'],
                ':fecha_dev' => $params['fecha_dev'],
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
        $sql = 'UPDATE prestamos SET socio =:socio WHERE id_socio=:id_socio';
        ConectarBD::escribir(
            sql: $sql,
            params: [
                ':id_socio' => $params['id_socio'],
                ':socio' => $params['socio'],
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
