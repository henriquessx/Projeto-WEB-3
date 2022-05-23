<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
</head>

<body>
    <form action="/categoria/save" method="post">
        <fieldset>
            <legend>Cadastro de Categoria</legend>
            <input type="hidden" id="id" name="id" value="<?= $model->id ?>">
            <label for="nome">Nome:</label>
            <input name="nome" id="nome" type="text" value="<?= $model->nome ?>" />

            <button type="submit">Enviar</button>

        </fieldset>
    </form>

</body>

</html>