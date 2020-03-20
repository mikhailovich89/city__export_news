<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>

<!--Контейнер для новостей-->
<div class="t-container news_container">


	<?php
	//Опции для функции stream_context_create();
	$contextOptions = array (
		"ssl" => array (
			"verify_peer" => false,
			"verify_peer_name" => false
		)
	);
	//Путь к json
	$jsonPath = 'https://news.sfu-kras.ru/json/city';
	//Получение содержимого json
	$jsonSelf = file_get_contents($jsonPath, false, stream_context_create($contextOptions));
	//Преобразование json в удобоиспользуемый вид
	$jsonCvt = json_decode($jsonSelf, true);
  // Определяем ключевое слово для проверки
  $keyWord = $rubricName;
  // Определяем длинну массива
  $arrLength = count($jsonCvt['items']);
  // Организуем цикл
  for ($i=0; $i < $arrLength; $i++) {
    //Осуществляем вывод массива по условию
    if (in_array($keyWord, $jsonCvt['items'][$i]['tags'])) {
  ?>

  <!--Вывод новости-->
  <div class="t649__col t-col t-col_4 t-align_left t-item news_item">
    <a class="t649__linkwrapper" href="<?php echo $jsonCvt['items'][$i]['link'] ?>" target="_blank">
      <div class="t649__blockimg t649__blockimg_3-2 t-bgimg" data-original="<?php echo $jsonCvt['items'][$i]['poster'] ?>" style="background: url(&#39;static/08393c30a3e0be1cdffa12659f39828b_2019.jpg&#39;) center center no-repeat; background-size:cover; margin: -6px;">
      </div>
      <div class="t649__textwrapper">
        <div class="t649__sp"></div>
        <div class="t649__title t-heading t-heading_sm" style="font-size:30px;font-weight:300;font-family:&#39;Roboto&#39;;" field="li_title__1489060571494"><?php echo $jsonCvt['items'][$i]['title'] ?></div>
        <div class="t649__text t-text t-text_sm" style="" field="li_descr__1489060571494"><?php echo $jsonCvt['items'][$i]['text'] ?></div>
        <div class="t649__btn-container">
          <div class="t649__btn-wrapper">
            <div class="t649__submit t-btn t-btn_xs" style="color:#ffffff;background-color:#000000;border-radius:4px; -moz-border-radius:4px; -webkit-border-radius:4px;">Подробнее</div>
          </div>
        </div>
      </div>
    </a>
  </div>

  <?php }} ?>

</div>

<!--Стили для новости-->
<style type="text/css">
  .news_container {
    column-count: 1;
    column-gap: ;
  }

  .news_item {
    break-inside: avoid;
    margin-bottom: 40px;
    border: 1px solid rgba(220, 220, 220, .5);
    border-radius: 4px;
    padding: 5px;
  }

  @media (min-width: 961px) {
    .news_container {
      column-count: 3;
    }
  }
</style>

  
</body>
</html>