<?php
if (!empty($_POST['right']) && !empty($_POST['answer'])) {
    if ($_POST['answer'] == $_POST['right']) {
        echo '<h3>Абсолютно верно!</h3>';
    } else {
        echo '<h3>Ответ не верный</h3>';
    }
        echo '<br />';
        echo '<a href="list.php"><button>Список всех тестов</button></a>';
}
if (!empty($_POST['right']) && empty($_POST['answer'])) {
    echo '<h3>Вы не заполнили тест!</h3>';
}
if (isset($_GET['test'])) {
    $content = file_get_contents('tests/'.$_GET['test']);
    $test = json_decode($content,true);
} elseif (empty($_POST)) {
    echo '<h3>Выберите тест!</h3>';
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>test.php</title>
</head>
<body>
<?php if(isset($test['answers'])) { ?>
    <h3>Заполните тест:</h3>
    <form action="test.php" method="POST">
        <fieldset>
            <legend><?php echo $test['question']; ?></legend>
            <?php foreach ($test['answers'] as $key => $value) {?>
                <label><input type="radio" name="answer" value="<?php echo $value; ?>"><?php echo $value; ?></label>
            <?php } ?>
        </fieldset><br>
        <input type="hidden" name="right" value="<?php echo $test['correct']; ?>">
        <input type="submit" value="Ответить">
    </form>
<?php } ?>
</body>
</html>