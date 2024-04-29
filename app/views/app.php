<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>App</title>
</head>
<body>
    <form action="<?=htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="GET">
        <input name="text" type="text" placeholder="Текст" pattern="\S{3,}" value="<?=$data?>">
        <input id="" type="submit" value="Найти">
    </form>
        <?php if (isset($resultData)):?>
        <div>
            <?php foreach ($resultData as $result): ?>
                <h3>Заголовок записи: <?= $result['postTitle'] ?></h3>
                <?php foreach ($result['bodyComments'] as $comment): ?>
                    <div>Комментарий: <?= $comment ?></div>
                <?php endforeach; ?>
                <br>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
</body>
</html>