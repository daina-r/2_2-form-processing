<?php
$dir = 'tests';
$files = array_diff( scandir( $dir), array('..', '.'));
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <title>list.php</title>
</head>
<body>
<?php if(isset($files)) { ?>
  <h3>Выберите тест</h3>
  <form action="test.php" method="GET" enctype="multipart/form-data">
    <fieldset>
      <legend><?php echo 'Тест №..' ?></legend>
      <?php foreach ($files as $key => $value) {?>
          <label><input type="radio" name="test" value="<?php echo $value; ?>"><?php echo ($key - 1); ?></label>
      <?php } ?>
    </fieldset><br />
    <input type="submit" value="Выбрать">
  </form><br /><br />
<?php } ?>
<a href="admin.php"><button>Загрузить новые тесты на сервер</button></a>
</body>
</html>