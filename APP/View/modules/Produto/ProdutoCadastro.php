<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <style>
        label, input { display: block;}
    </style>
</head>
<body>
    <form action="/produto/save" method="post">
        <fieldset>
            <legend>Cadastro de Produto</legend>
            <label for="produto">Produto:</label>
            <input name="produto" id="produto" type="text" />

            <label for="codigo_barra">Código de barras:</label>
            <input name="codigo_barra" id="codigo_barra" type="text" />

            <label for="data_fabric">Data de Fabricação:</label>
            <input name="data_fabric" id="data_fabric" type="date" />

            <button type="submit">Enviar</button>

        </fieldset>
    </form>    
</body>
</html>