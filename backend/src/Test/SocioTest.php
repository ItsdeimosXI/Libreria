<?php


declare(strict_types=1);

namespace Raiz\EspacioNombres;

use PHPUnit\Framework\TestCase;
use Raiz\Models\Socio;


class SocioTest extends TestCase
{
    /** @Test */
    public function testSocio(): void
    {
        $socio = new Socio( "Manuel Salamanca", "2022", 1,  45209072, 26546546, "2004");
        $persona = [
             "es_activo" => 1, "fecha_alta" => "2022", "dni" => 45209072 , "nombre_apellido" => "Manuel salamanca", "direccion" => "2004", "telefono" => 26546546
        ];
        $this->assertIsArray($persona);
        $sociotest = socio::deserializar($persona);
        $this->assertEquals($socio, $sociotest);
        $this->assertEquals($socio->GetNombre(), $sociotest->GetNombre());
        $this->assertInstanceOf("raiz\Models\Persona", $sociotest);
    }
}
