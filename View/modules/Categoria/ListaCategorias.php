<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Categorias</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container">
        <h1>Lista de Categorias</h1>
        <table class="bordered striped centered highlight responsive-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                </tr>
            </thead>

            <?php foreach ($model->rows as $item) : ?>
                <tr>
                    <td><?= $item['id'] ?></td>
                    <td><?= $item['nome'] ?></td>
                    <td>
                        <a href="/categoria/form?id=<?= $item['id'] ?>"></i></a>
                        <a href="/categoria/excluir?id=<?= $item['id'] ?>"></i></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</body>

</html>