<?php

namespace Src\Controller;

use Root\Controller;
use Root\Request;
use Root\Router;
use Src\Entity\Usuario;
use Src\Repository\UsuarioRepository;

class IndexController extends Controller {
    public function index() {
        if ($this->getUser()) {
            return $this->render('Index/index', [
                'user' => $this->getUser()
            ]);
        }

        return $this->render('Index/index');
    }

    public function login() {
        /** @var Usuario $usuario */
        $usuario = Request::getData(Usuario::class);

        if ($usuario) {
            $repository = new UsuarioRepository();
            $findUsuario = $repository->findByEmail($usuario->getEmail());

            if (password_verify($usuario->getSenha(), $findUsuario->getSenha())) {
                $this->setUser($findUsuario->setSenha(null));
                Router::redirect('');
            }

            echo 'Credenciais inválidas!';
        }

        return $this->render('Index/login');
    }

    public function cadastro() {
        /** @var Usuario $usuario */
        $usuario = Request::getData(Usuario::class);

        if ($usuario){
            $senha = password_hash($usuario->getSenha(), 1);
            $usuario->setSenha($senha);

            $repository = new UsuarioRepository();
            $repository->insert($usuario);

            $this->setUser($usuario->setSenha(null));
            Router::redirect('');
        }

        return $this->render('Index/cadastro');
    }
}