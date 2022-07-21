<?php

namespace SistemaFederacion\Tests;

use PHPUnit\Framework\TestCase;
use SistemaFederacion\Controllers\Usuarios;

class UsuariosTest extends TestCase
{

    public function testGetUsuario()
    {

        $usuarioPrueba = new Usuarios();
        $this->asserEqueals('{"idpersona":"27","cedula":"0955489546","nombres":"Felipe","apellidos":"Mirabá","telefono":"988659003","email_user":"felipe2@hotmail.com","id_rol":"4","nombre_rol":"Usuario Partido","status":"1","fechaRegistro":"12-08-2021"}}
        ', $usuarioPrueba->getUsuario(27));

    }
}

// EOF
