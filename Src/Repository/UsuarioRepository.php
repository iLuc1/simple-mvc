<?php

namespace Src\Repository;

use Root\Database;
use Root\Entity;
use Src\Entity\Usuario;

class UsuarioRepository extends Database {
    use Entity;

    const INSERT = <<<SQL
      INSERT INTO usuario(nome, email, senha, role) VALUES(:nome, :email, :senha, :role);
SQL;

    public function insert(Usuario $usuario) {
        $nome = $usuario->getNome();
        $email = $usuario->getEmail();
        $senha = $usuario->getSenha();
        $role = $usuario->getRole();

        $query = $this->getConnection()->prepare(self::INSERT);
        $query->bindParam(':nome', $nome);
        $query->bindParam(':email', $email);
        $query->bindParam(':senha', $senha);
        $query->bindParam(':role', $role);
        $query->execute();
    }


    const FIND_BY_EMAIL = <<<SQL
      SELECT * FROM usuario WHERE email = :email
SQL;

    public function findByEmail($email) {
        $query = $this->getConnection()->prepare(self::FIND_BY_EMAIL);
        $query->bindParam(':email', $email);
        $query->execute();

        $result = $query->fetch();
        return $this->build(Usuario::class, $result);
    }
}