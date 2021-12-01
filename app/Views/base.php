<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?= $this->renderSection("css")?>
    <?= $this->renderSection("javascript")?>


</head>
<body>
    <header>
        <h1><?=$title ?></h1>
    </header>

    <div id="container">
        <?= $this->renderSection("content")?>
    </div>

    <footer></footer>
</body>
</html>