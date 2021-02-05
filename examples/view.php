<?
require_once '../src/OchApi.php';
use OchApi\OchApi;

$apiKey = ''; // Ваш API ключ
$OchApi = new OchApi($apiKey);

$serversInfo = json_decode($OchApi->GetServersInfo());
$serversStats = json_decode($OchApi->GetServersStats());
$usersVk = json_decode($OchApi->GetUsersVk());
$messages = json_decode($OchApi->GetMessages());
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OCH API</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <style>
        .avatar {
            height: 30px;
            width: 30px;
            margin-right: 5px;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <h2>OCH API</h2>
        <p>OCH API позволяет автоматизировать получение информации о ваших игровых серверах. Для выполнения запросов необходимо получить API ключ в личном кабинете.</p>

        <h2>Информация о серверах</h2>
        <?if($serversInfo):?>
            <?foreach($serversInfo->servers as $server):?>
                <table class="table mt-3">
                  <thead>
                    <tr>
                      <th scope="col">IP</th>
                      <th scope="col">Сервер</th>
                      <th scope="col">Карта</th>
                      <th scope="col">Игроки</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?=$server->ip?></td>
                      <td><?=$server->hostName?></td>
                      <td><?=$server->map?></td>
                      <td><?=$server->players?>/<?=$server->maxPlayers?></td>
                    </tr>
                  </tbody>
                </table>
                <?if($server->playersList):?>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Ник</th>
                      <th scope="col">Фраги</th>
                      <th scope="col">Время на сервере</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?foreach($server->playersList as $player):?>
                    <tr>
                      <td><?=$player->id?></td>
                      <td><?=$player->name?></td>
                      <td><?=$player->frags?></td>
                      <td><?=$player->timeF?></td>
                    </tr>
                    <?endforeach;?>
                  </tbody>
                </table>
                <?endif;?>
            <?endforeach;?>
        <?endif;?>

        <h2>Серверная статистика</h2>
        <?if($serversStats):?>
            <?foreach($serversStats->servers as $server):?>
                <table class="table mt-3">
                  <thead>
                    <tr>
                      <th scope="col">Ник</th>
                      <th scope="col">Скилл</th>
                      <th scope="col">Смертей</th>
                      <th scope="col">Убийств</th>
                      <th scope="col">В голову</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?foreach($server->topList as $player):?>
                        <tr>
                          <td><?=$player->name?></td>
                          <td><?=$player->skill?></td>
                          <td><?=$player->kills?></td>
                          <td><?=$player->death?></td>
                          <td><?=$player->head?></td>
                        </tr>
                    <?endforeach;?>
                  </tbody>
                </table>
            <?endforeach;?>
        <?endif;?>

        <h2>Пользователи ВКонтакте</h2>
        <?if($usersVk):?>
            <table class="table mt-3">
              <thead>
                <tr>
                  <th scope="col">Пользователь</th>
                  <th scope="col">Ник</th>
                  <th scope="col">Описание</th>
                </tr>
              </thead>
              <tbody>
              <?foreach($usersVk->users as $user):?>
                <tr>
                  <td class="d-flex">
                      <img src="<?=$user->photo50?>" class="avatar" alt="">
                      <a href="https://vk.com/id<?=$user->peerId?>" target="_blank"><?=$user->firstName?></a>
                  </td>
                  <td>
                      <?if($user->nickName):?>
                          <?=$user->nickName?>
                      <?else:?>
                          -
                      <?endif;?>
                  </td>
                   <td>
                      <?if($user->description):?>
                          <?=$user->description?>
                      <?else:?>
                          -
                      <?endif;?>
                  </td>
                </tr>
              <?endforeach;?>
              </tbody>
            </table>
        <?endif;?>

        <h2>Сообщения</h2>
        <?if($messages):?>
            <table class="table mt-3">
              <thead>
                <tr>
                  <th scope="col">Пользователь</th>
                  <th scope="col">Сообщение</th>
                  <th scope="col">Дата</th>
                  <th scope="col">Платформа</th>
                </tr>
              </thead>
              <tbody>
              <?foreach($messages->messages as $message):?>
                  <tr>
                  <td class="d-flex">
                      <img src="<?=$message->photo50?>" class="avatar" alt="">
                      <a href="https://vk.com/id<?=$message->peerId?>" target="_blank"><?=$message->firstName?></a>
                  </td>
                  <td><?=$message->message?></td>
                  <td><?=$message->date?></td>
                  <td><?=$message->platform?></td>
                </tr>
              <?endforeach;?>
              </tbody>
            </table>
        <?endif;?>
    </div>
</body>
</html>