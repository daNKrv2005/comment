

<?php
  /* Принимаем данные из формы */
  $name = $_POST["name"];
  $page_id = $_POST["page_id"];
  $text_comment = $_POST["text_comment"];
  $name = htmlspecialchars($name);// Преобразуем спецсимволы в HTML-сущности
  $text_comment = htmlspecialchars($text_comment);// Преобразуем спецсимволы в HTML-сущности
  $mysqli = new mysqli("localhost", "root", "", "my_base");// Подключается к базе данных
  $mysqli->query("INSERT INTO `comments` (`name`, `page_id`, `text_comment`) VALUES ('$name', '$page_id', '$text_comment')");// Добавляем комментарий в таблицу

 
?>


<?php
  $page_id = 150;// Уникальный идентификатор страницы (статьи или поста)
  $mysqli = new mysqli("localhost", "root", "", "my_base");// Подключается к базе данных
  $result_set = $mysqli->query("SELECT * FROM `comments` WHERE `page_id`='$page_id'"); //Вытаскиваем все комментарии для данной страницы
  while ($row = $result_set->fetch_assoc()) {
    print_r($row); //Вывод комментариев
    echo "<br />";
  }
?>

<form name="comment" action="hrt.php" method="post">
  <p>
    <label>Имя:</label>
    <input type="text" name="name" />
  </p>
  <p>
    <label>Комментарий:</label>
    <br />
    <textarea name="text_comment" cols="30" rows="50"></textarea>
  </p>
  <p>
    <input type="hidden" name="page_id" value="150" />
    <input type="submit" value="Отправить" />
  </p>
</form>