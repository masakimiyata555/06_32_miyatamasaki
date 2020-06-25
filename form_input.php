<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>書き込みフォーム</title>
  <link href="http://localhost/06_32_masakimiyata/style.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=M PLUS Rounded 1c" rel="stylesheet">
  <style>
          legend {
            text-align:center
            }

            div{padding: 10px;font-size:20px;
            }

           
            
      </style>
</head>

<body>
<form action="form_create.php" method="POST">
    <fieldset>
      <legend>SQLファイル書き込みリスト</legend>
      <a href="form_read.php">一覧画面</a>
      <div>
        会社名: <input type="text" name="todo">
      </div>
      <div>
        日付: <input type="date" name="deadline">
      </div>

      <div>
        午前･午後：
         <br>
         <input name = "am_pm"type="radio" value="am">午前</br>
         <br>
         <input name="am_pm"type="radio" value="pm">午後</br>
      
      </div>
      
      <div class=information>
        お荷物の情報：
        <br>
         <textArea type="text"name="information"></textArea></br>
      </div>

      <div>
       備考：
       <br>
       <textArea type="text"name="contact"></textArea></br>
      </div>

      <div>
        <button>送信</button>
      </div>
    </fieldset>
  </form>

</body>

</html>