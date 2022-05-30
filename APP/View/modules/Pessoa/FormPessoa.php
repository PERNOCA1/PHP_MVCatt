<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pessoa</title>
    <style>
        label, input { display: block;}
    </style>
</head>
<body>
    <form action="/pessoa/save" method="post">
        <fieldset>
            <legend>Cadastro de Pessoa</legend>
            <form method="post" action="pessoa/form/save">
            <label for="nome">Nome:</label>
            <input name="nome" name="nome" type="text" />

            <label for="rg">RG:</label>
            <input name="rg" name="rg" value="<?= $model->nome ?>" type="text" />

            <label for="cpf">CPF:</label>
            <input name="cpf" name="cpf" value="<?= $model->cpf ?>" type="number" />

            <label for="data_nascimento">Data Nascimento:</label>
            <input name="data_nascimento" value="<?= $model->data_nascimento ?>" name="data_nascimento" type="date" />

            <label for="email">E-mail:</label>
            <input name="email" name="email" value="<?= $model->email ?>" type="email" />

            <label for="telefone">Telefone:</label>
            <input name="telefone" name="telefone" value="<?= $model->telefone ?>" type="numer" />

            <label for="endereco">Endereço:</label>
            <input name="endereco" name="endereco"  value="<?= $model->endereco ?>"type="text" />

            <button type="submit">salvar</button>
            </form>
        </fieldset>
    </form>    
</body>
</html>