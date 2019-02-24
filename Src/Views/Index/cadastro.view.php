<?php require_once 'Src/Views/top.view.php'; ?>

    <form method="post">
        <input type="text" name="nome" placeholder="Nome: ">
        <input type="email" name="email" placeholder="Email: ">
        <input type="password" name="senha" placeholder="Senha: ">

        <select name="role" >
            <option value="professor">professor</option>
            <option value="estudante">estudante</option>
        </select>

        <input type="submit">
    </form>

<?php require_once 'Src/Views/bottom.view.php'; ?>