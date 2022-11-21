<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <style>
        label,
        input {
            display: block;
        }
    </style>
</head>

<body>
    <form action="/usuario/save" method="post">
        <fieldset>
            <legend>Cadastro de Usuário</legend>
            <input type="hidden" name="id" id="id" value="<?= $model->id ?>" />

            <label for="nome">Nome:</label>
            <input name="nome" id="nome" type="text" value="<?= $model->nome ?>" />

            <label for="usuario">Usuário:</label>
            <input name="usuario" id="usuario" type="text" value="<?= $model->usuario ?>" />

            <label for="email">E-Mail:</label>
            <input name="email" id="email" type="email" value="<?= $model->email ?>" />

            <label for="senha">senha:</label>
            <input name="senha" id="senha" type="password" value="<?= $model->senha ?>" />

            <button type="submit">Enviar</button>
        </fieldset>
    </form>

</body>

</html>