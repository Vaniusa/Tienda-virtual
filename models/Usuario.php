<?php
/**
 * Created by PhpStorm.
 * User: AlesikaPc
 * Date: 17/03/2019
 * Time: 20:26
 */

class Usuario
{
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $rol;
    private $imagen;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return$this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre): void
    {
        $this->nombre =  $this->db->real_escape_string($nombre);
    }

    /**
     * @return mixed
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * @param mixed $apellidos
     */
    public function setApellidos($apellidos): void
    {
        $this->apellidos =  $this->db->real_escape_string($apellidos);
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email =  $this->db->real_escape_string($email);
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = password_hash($this->db->real_escape_string($password),
            PASSWORD_BCRYPT, ['cost' => 4]);
    }



    /**
     * @return mixed
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * @param mixed $rol
     */
    public function setRol($rol): void
    {
        $this->rol = $rol;
    }

    /**
     * @return mixed
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * @param mixed $imagen
     */
    public function setImagen($imagen): void
    {
        $this->imagen = $imagen;
    }

    public function save(){
        $sql = "INSERT INTO usuarios VALUES(NULL,
                            '{$this->getNombre()}',
                            '{$this->getApellidos()}',
                            '{$this->getEmail()}',
                            '{$this->getPassword()}',
                            'user',
                            null)";
        $save = $this->db->query($sql);

        $result = false;
        if ($save){
            $result=true;
        }
        return $result;
    }

}