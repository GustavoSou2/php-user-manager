<?php

include_once('./db.fake.php');

function parseFormatToTel($tel)
{
    return preg_replace("/(\d{2})(\d{4})(\d{4})/", "($1) $2-$3", $tel);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) :
    $userId = $_POST['id'];

    $user = array_values(array_filter($usuarios, function ($usuario) use ($userId) {
        return $usuario['id'] == $userId;
    }))[0];

    $backgroundJobType = [
        '1' => 'https://images.pexels.com/photos/577585/pexels-photo-577585.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
        '2' => 'https://images.pexels.com/photos/196644/pexels-photo-196644.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
    ];


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

    $activeDict = $isActiveDict[$user['isActive']];
?>

    <section class="user-detail d-flex flex-column  <?= $activeDict['class'] ?>">
        <div class="user-detail-banner" style="background-image: url(<?= $backgroundJobType[$user['jobType']] ?>);"></div>
        <div class="user-detail-avatar" style="background-image: url(https://randomuser.me/api/portraits/<?= $user['gender'] ?>/<?= $user['id'] ?>.jpg)"></div>
        <div class="user-detail-info">
            <h1 class="user-detail-info-name ml-3"><?= $user['name'] ?></h1>
            <p class="user-detail-info-job ml-3"><?= $user['job'] ?></p>

            <div class="active-badget mt-1 mb-3 text-center d-flex align-items-center">
                <div class="circle"></div>
                <?= $activeDict['label'] ?>
            </div>

            <div class="user-detail-assets">
                <div class="asset text-center">
                    <h3><?= $user['qtdeTask'] ?></h3>
                    <p>Qtde. Atividades</p>
                </div>
                <div class="asset text-center">
                    <h3><?= $user['qtdeAssets'] ?></h3>
                    <p>Qtde. Ativos</p>
                </div>
                <div class="asset text-center">
                    <h3><?= $user['qtdeSubAssets'] ?></h3>
                    <p>Qtde. Sub-ativos</p>
                </div>
            </div>


            <div class="user-detail-info-contacts mt-4 ml-2 mr-2 d-flex flex-column">
                <div class="d-flex align-items-center mt-2">
                    <i class="fa-solid fa-envelope"></i>
                    <p class="ms-2"><?= $user['mail'] ?></p>
                </div>

                <div class="d-flex align-items-center mt-2">
                    <i class="fa-solid fa-phone"></i>
                    <p class="ms-2"><?= parseFormatToTel($user['phone']) ?></p>
                </div>

                <div class="d-flex align-items-center mt-2">
                    <i class="fa-solid fa-location-dot"></i>
                    <p class="ms-2"><?= $user['address'] ?></p>
                </div>

                <div class="d-flex align-items-center mt-2">
                    <i class="fa-solid fa-birthday-cake"></i>
                    <p class="ms-2"><?= $user['birthdate'] ?></p>
                </div>
            </div>

            <div class="user-detail-options mt-4">
                <div class="option d-flex flex-column align-items-center">
                    <i class="fa-solid fa-share-nodes " data-bs-toggle="tooltip" data-bs-placement="bottom" title="Compartilhar"></i>
                </div>
                <div class="option d-flex flex-column align-items-center">
                    <i class="fa-solid fa-message " data-bs-toggle="tooltip" data-bs-placement="bottom" title="Mensagem"></i>
                </div>
                <div class="option d-flex flex-column align-items-center">
                    <i class="fa-solid fa-bell " data-bs-toggle="tooltip" data-bs-placement="bottom" title="Elogiar"></i>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<link rel="stylesheet" href="./css/user-detail-dialog.css">