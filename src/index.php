<?php

include_once('./db.fake.php');


function parseFormatToTel($tel)
{
    return preg_replace("/(\d{2})(\d{4})(\d{4})/", "($1) $2-$3", $tel);
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="./css/style.css" rel="stylesheet">
    <link href="./css/_menu.css" rel="stylesheet">
</head>

<body>
    <aside class="menu">
        <section class="menu-logo d-flex justify-content-between align-items-center">
            <span class="logo">User Manager</span>
        </section>
        <section class="menu-user d-flex align-items-center ">
            <img src="https://api.dicebear.com/9.x/fun-emoji/svg?eyes=glasses&backgroundColor=b6e3f4" alt="">
            <div class="menu-user-perfil d-flex flex-column justify-content-center">
                <p>Gustavo de Souza</p>
                <span>Desenvolvedor Web</span>
            </div>
        </section>

        <ul class="menu-list">
            <li>
                <a class="d-flex align-items-center" href="user.php"><i class="fa-solid fa-user"></i> Usuários</a>
            </li>
            <li>
                <a class="d-flex align-items-center" href="profile.php"><i class="fa-solid fa-sign-out"></i> Sair</a>
            </li>
        </ul>
    </aside>
    <main>
        <div class="background-gradient"></div>
        <section class="content">
            <section class="welcome d-flex flex-column">
                <span>Bem vindo</span>
                <span>Gustavo Souza 👋</span>
            </section>

            <section class="cards">
                <div class="card-user user-active">
                    <div class="card-user-info d-flex flex-column">
                        <span>3</span>
                        <div class="card-user-info-description">
                            <label for="">Usuários</label>
                            <p>Ativos</p>
                        </div>
                    </div>
                </div>
                <div class="card-user user-inactive">
                    <div class="card-user-info d-flex flex-column">
                        <span>3</span>
                        <div class="card-user-info-description">
                            <label for="">Usuários</label>
                            <p>Inativos</p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content-data">
                <div class="content-data-scroll">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>
                                <th scope="col">Tel</th>
                                <th scope="col">Endereço</th>
                                <th scope="col">Ativo?</th>
                                <th scope="col">Cargo</th>
                                <th scope="col">Qtde. Atividades</th>
                                <th scope="col">Qtde. Ativos</th>
                                <th scope="col">Qtde. Sub Ativos</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($usuarios as $index => $value) :
                                $isActiveDict = [
                                    '1' => [
                                        'class' => 'user-active',
                                        'label' => 'Ativo'
                                    ],
                                    '0' => [
                                        'class' => 'user-inactive',
                                        'label' => 'Inativo'
                                    ]
                                ];

                                $activeDict = $isActiveDict[$value['isActive']];
                            ?>
                                <tr class="<?= $activeDict['class'] ?>" data-toggle="modal" data-target="#userDatailDialog" data-user-id="<?= $value['id'] ?>">
                                    <td>
                                        <div class="container-cog">
                                            <i class="fa-solid fa-cog"></i>
                                        </div>
                                        <?= $value['name'] ?>
                                    </td>
                                    <td><?= $value['mail'] ?></td>
                                    <td><?= parseFormatToTel($value['phone']) ?></td>
                                    <td><?= $value['address'] ?></td>
                                    <td class="text-center">
                                        <div class="active-badget text-center d-flex align-items-center">
                                            <div class="circle"></div>
                                            <?= $activeDict['label'] ?>
                                        </div>
                                    </td>
                                    <td class="text-center"><?= $value['job'] ?></td>
                                    <td class="text-center"><?= $value['qtdeTask'] ?></td>
                                    <td class="text-center"><?= $value['qtdeAssets'] ?></td>
                                    <td class="text-center"><?= $value['qtdeSubAssets'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </section>
    </main>

    <div class="dialog" id="userDatailDialog" tabindex="-1" role="dialog">
        <div class="dialog-content">
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="./js/script.js"></script>
</body>

</html>