<?php

namespace Src\Controller;

use Root\Controller;
use Root\Request;
use Root\Router;
use Src\Entity\Disciplina;
use Src\Entity\Usuario;
use Src\Repository\DisciplinaRepository;
use Src\Repository\UsuarioRepository;

class DisciplinaController extends Controller {

    public function cadastro() {
        /** @var Disciplina $disciplina */
        $disciplina = Request::getData(Disciplina::class);

        if ($disciplina){
            $repository = new DisciplinaRepository();
            $repository->insert($disciplina);
            Router::redirect('');
        }

        return $this->render('Disciplina/cadastro');
    }
}