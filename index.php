<?php
  $langList = ["PHP", "Ruby", "Python", "C"];
 ?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="doc/docs.css">
    <link rel="stylesheet" href="lib/codemirror.css">
    <script src="lib/codemirror.js"></script>
    <script src="addon/edit/matchbrackets.js"></script>

    <?php
      $modeList = scandir(__DIR__."\\mode\\");
      unset($modeList[array_search(".", $modeList)]);
      unset($modeList[array_search("..", $modeList)]);
      foreach($modeList as $mode):
     ?>
     <script src="mode/<?php echo "{$mode}/{$mode}.js"; ?>"></script>
    <?php endforeach; ?>

    <?php
      $themeList = scandir(__DIR__."\\theme\\");
      unset($themeList[array_search(".", $themeList)]);
      unset($themeList[array_search("..", $themeList)]);
      foreach($themeList as $theme):
    ?>
    <link rel="stylesheet" href="<?php echo "theme\\{$theme}"; ?>">
    <?php endforeach; ?>

    <link rel="stylesheet" href="./css/index.css">
    <title>RealTimePreview</title>
  </head>
  <body>
    <header></header>

    <main>
      <h2><span id="currentLang"><?php echo $langList[0]; ?></span>をリアルタイムで実行します。</h2>

      <div class="center select-area">
        <div class="theme-select">
          <label for="themeList">エディタのテーマ : </label>
          <select id="themeList" name="themeList">
            <?php
            foreach($themeList as $theme):
              $theme = str_replace(".css", "", $theme);
              ?>
              <option value="<?php echo $theme; ?>"><?php echo $theme; ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="lang-select">
          <label for="langList">言語を選択 : </label>
          <select id="langList" name="langList">
            <?php  foreach($langList as $lang):  ?>
              <option value="<?php echo $lang; ?>"><?php echo $lang; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <textarea id="code" name="code" rows="8" cols="80"></textarea>

      <div class="center">
        <button type="button" id="run" class="btn btn-secondary">実行</button>
      </div>

      <div class="center">
        <iframe id="display" width="90%" height="300px"></iframe>
      </div>
    </main>

    <footer></footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./js/index.js"></script>
  </body>
</html>
