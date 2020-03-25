<div class="t-container news_container">

  <?php
  $context_options = array (
   "ssl" => array (
    "verify_peer" => false,
    "verify_peer_name" => false
  )
  );

  $json_path = 'https://news.sfu-kras.ru/json/city';
  $json = file_get_contents($json_path, false, stream_context_create($context_options));
  $arr_news = json_decode($json, true);
  $key_word = $rubric_name;
  $current_date = date('d-m-Y');

  foreach ($arr_news['items'] as $key_i => $value_i) {
    if (in_array($key_word, $value_i['tags'])) {
      foreach ($value_i['tags'] as $key_t => $value_t) {
        if (strstr($value_t, 'date')) {
          parse_str($value_t);
          if (strtotime($date) < strtotime($current_date)) {
            unset($value_i);
          }
        }
      }
      if ($value_i) {
        ?>

        <div class="t649__col t-col t-col_4 t-align_left t-item news_item">
          <a class="t649__linkwrapper" href="<?php echo $value_i['link'] ?>" target="_blank">
            <div class="t649__blockimg t649__blockimg_3-2 t-bgimg" data-original="<?php echo $value_i['poster'] ?>" style="background: url(&#39;static/08393c30a3e0be1cdffa12659f39828b_2019.jpg&#39;) center center no-repeat; background-size:cover; margin: -6px;">
            </div>
            <div class="t649__textwrapper">
              <div class="t649__sp"></div>
              <div class="t649__title t-heading t-heading_sm" style="font-size:30px;font-weight:300;font-family:&#39;Roboto&#39;;" field="li_title__1489060571494"><?php echo $value_i['title'] ?></div>
              <div class="t649__text t-text t-text_sm" style="" field="li_descr__1489060571494"><?php echo $value_i['text'] ?></div>
              <div class="t649__btn-container">
                <div class="t649__btn-wrapper">
                  <div class="t649__submit t-btn t-btn_xs" style="color:#ffffff;background-color:#000000;border-radius:4px; -moz-border-radius:4px; -webkit-border-radius:4px;">Подробнее</div>
                </div>
              </div>
            </div>
          </a>
        </div>

        <?php
      }
    }
  }
  ?>

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