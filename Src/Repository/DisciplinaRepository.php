<?php

namespace Src\Repository;

use Root\Database;
use Root\Entity;
use Src\Entity\Disciplina;

class DisciplinaRepository extends Database {
    use Entity;

    const INSERT = <<<SQL
      INSERT INTO disciplina(nome) VALUES(:nome);
SQL;

    public function insert(Disciplina $disciplina) {
        $nome = $disciplina->getNome();

        $query = $this->getConnection()->prepare(self::INSERT);
        $query->bindParam(':nome', $nome);
        $query->execute();
    }

}