<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Lista de Pordutos</title>
</head>
<body>

    <table>
        <tr>
            <th></th>
            <th>Id</th>
            <th>Produto</th>
            <th>Codigo de barra</th>
            <th>Data de fabricação</th>
        </tr>
        <?php foreach($model->rows as $item): ?>
            <tr>
                <td>
                    <a href="/produto/delete?id=<?= $item->id ?>"></a>
                </td>

                <td><?= $item->id ?></td>

                <td>
                    <a href="/produto/cadastro?id=<?= $item->id ?>"><?= $item->produto ?></a>
                </td>
                <td><? $item->codigo_barra ?></td>
                <td><? $item->data_fabric ?></td>
            </tr>
            <?php endforeach ?>

            <?php if(count($model->rows) == 0): ?>
                <tr>
                    <td colspan="5">Nenhum registro encontrado</td> 
                </tr>
            <?php endif ?>
    </table>
</body>
</html>