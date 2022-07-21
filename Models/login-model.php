<?php

class LoginModel extends Mysql
{
    public function __construct()
    {
        parent::__construct();
    }
    /*  Funcion que recibe el usuario y contraseña */
    public function login_user(string $usuario, string $password)
    {
        $sql = "SELECT idpersona,status FROM persona WHERE
					email_user = '$usuario' and
					password = '$password' and
					status != 0 ";
        return $this->select($sql);
    }
    /*Funcion que permite identificar el role para la secciones recibe un id user*/
    public function session_login(int $iduser)
    {

        //BUSCAR ROLE
        $sql = "SELECT p.idpersona,
							p.cedula,
							p.nombres,
							p.apellidos,
							p.telefono,
							p.email_user,
							r.id_rol,r.nombre_rol,
							p.status
					FROM persona p
					INNER JOIN rol r
					ON p.id_rol = r.id_rol
					WHERE p.idpersona = '$iduser'";
        $request = $this->select($sql);
        //$_SESSION['userData'] = $request;
        return $request;
    }
    /*Esta funciona genera los datos de un usuario por medio del email recibiendolo como parametro*/
    public function get_user_email(string $strEmail)
    {
        $sql = "SELECT idpersona,nombres,apellidos,status FROM persona WHERE
					email_user = '$strEmail' and
					status = 1 ";
        return $this->select($sql);
    }
    /*Funcion que permite asignar un token para el reseteo de la contraseña en caso de olvido o perdida*/
    public function set_token_user(int $idpersona, string $token)
    {
        $sql = "UPDATE persona SET token = ? WHERE idpersona = '$idpersona' ";
        $arrData = array($token);
        return $this->update($sql, $arrData);
    }
    /*Funcion que recupera un usuario por email y token al momento de resetear*/
    public function get_usuario(string $email, string $token)
    {
        $sql = "SELECT idpersona FROM persona WHERE
					email_user = '$email' and
					token = '$token' and
					status = 1 ";
        return $this->select($sql);
    }
    /*Funcion que permite insertar una contraseña al momento de resetear */
    public function insert_password(int $idPersona, string $password)
    {
        $sql = "UPDATE persona SET password = ?, token = ? WHERE idpersona = '$idPersona' ";
        $arrData = array($password, "");
        return $this->update($sql, $arrData);
    }
}

// EOF
