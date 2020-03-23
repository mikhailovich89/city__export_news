<?php
// Устанавливаем кодировку
header('Content-Type: text/html; charset=utf-8');
?>
<!--Контейнер для новостей-->
<div class="t-container news_container">


	<?php

  //Ключевое слово для отладки
	$rubricName = "открытый университет образование";



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
  // Определяем длинну массива элементов, каждый из которых содержит данные для формирования новости
	$arrLength = count($jsonCvt['items']);
  // Отладка
	var_dump($arrLength);
	
  // Обходим массив элементов в цикле
	for ($i=0; $i < $arrLength; $i++) {
  	// Если тэги массива для формирования новости содержат ключевое слово, то работаем с ним, то есть формирование новости производим из него
		if (in_array($keyWord, $jsonCvt['items'][$i]['tags'])) {
    	//Отладка
			echo "<pre>";
			print_r($jsonCvt['items'][$i]['tags']);
			echo "</pre>";
      	// Находим ключ строки по вхождению подстроки в эту строку
      	// Для этого обходим тэги
			foreach ($jsonCvt['items'][$i]['tags'] as $key => $value) {
      		// Если значение элемента тега содержит вхождение подстроки, то работаем с ним
				if (strstr($value, 'date')) {
    			// Присваиваем в переменную значение строки, найденное по ключу
					$str = $jsonCvt['items'][$i]['tags'][$key];
    			// Парсим строку с помощью функции в результате получаем переменную со значением
					parse_str($str);
    			//Отладеа
					echo "<pre>";
					print_r($date);
					echo "</pre>";
				}
			}


      // array_keys($array, value) Возвращает ключ(и) массива по значению
      // array_search(value, $array) Возвращает ключ первого найденного элемента по значению
      // in_array(valie, $array) Возвращает true если значение было найдено в массиве
      // array_values($array) Возвращает заново индексированный массив значений
      // array_walk($array, 'function') Применяет функцию к каждому элементу массива
      // count($array) Подсчитывает количество элементов массива или чего-либо в объекте
      // current($array) Возвращает текущий элемент массива
      // next($array) Возвращает следующий элемент массива
      // prev($array) Возвращает предыдущий элемент массива
      // end($array) Возвращает последний элемент массива
      // key($array) Возвращает индекс текущего элемента массива

      // explode(delimiter, string) Разбивает строку с помощью разделителя!
      // parse_str() // Разбирает строку в переменные
      // stripos(haystack, needle) Возвращает позицию первого вхождения подстроки без учета регистра
      // strpos(haystack, needle) Возвращает позицию первого вхождения подстроки
      // strlen(string) Возвращает длинну строки
      // strstr(haystack, needle) Находит первое вхождение подстроки






      //Сначала найти, а потом взорвать








      /*
  ?>

  <!--Вывод новости
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
  -->

<?php */}} ?>

</div>

<!--Стили для новости-->
<style type="text/css">
  /*
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
    }*/
</style>