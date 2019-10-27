<?php
// instagram download

$post = $_POST['link'];

if($post){
$html = file_get_contents($post);
$doc = new DOMDocument();
$doc->loadHTML($html);
$xml = simplexml_import_dom($doc) or die("Error: Cannot create object");
}

?>

<!DOCTYPE html>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>instaviber</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Tajawal" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="shortcut icon" href="favicon.ico">
<meta property="og:title" content="">
<meta property="og:url" content="">
<meta property="og:type" content="website">
<meta property="og:image" content="">

<style>
body{margin:0;background:#f9f9f9;direction:rtl;font:14px arial,tahoma}
header{font-family: 'Tajawal', sans-serif;text-align:center}
header #top{font-family: 'Tajawal', sans-serif;background:#fff;box-shadow:0 1px 4px #ccc}
header #logo{font-family: 'Tajawal', sans-serif;padding:40px 20px 25px}
header a.logo{font:900 49px lato,arial;color:#b36b00;letter-spacing:-1px;text-shadow:0 2px 2px #ddd;word-wrap:break-word}
header a.logo:hover{text-decoration:none}
header a .logoext{font-size:31px}
section#urlbox{margin:0 auto 20px auto;max-width:700px;box-shadow:0 1px 4px #ccc;border-radius:2px;padding:10px 30px 5px;background:#fff;text-align:center}
section#urlbox h1{margin:10px auto 30px auto}
#formurl{display:table;max-width:600px;margin:0 auto}
#formurl input[type=url]{display:table-cell;width:100%;height:56px;padding:10px 16px;font:17px lato,arial;color:#000;background:#fff;border:1px solid #bbb;border-left:0;border-radius:3px;border-bottom-left-radius:0;border-top-left-radius:0;box-sizing:border-box}
#formurl input[type=text]{display:table-cell;width:100%;height:56px;padding:10px 16px;font:17px lato,arial;color:#000;background:#fff;border:1px solid #bbb;border-left:0;border-radius:3px;border-bottom-left-radius:0;border-top-left-radius:0;box-sizing:border-box}
#formurl #formbutton{display:table-cell;width:1%;box-sizing:border-box;vertical-align:middle}
#formurl input[type=button],#formurl input[type=submit]{height:56px;padding:10px 16px;font:bold 17px lato,arial;color:#fff;background-color:#b36b00;text-align:center;vertical-align:middle;cursor:pointer;white-space:nowrap;border:0;border-radius:3px;border-top-right-radius:0;border-bottom-right-radius:0;margin-right:-1px;-webkit-appearance:button;margin:0}

html{font-family: 'Tajawal', sans-serif;position:relative;min-height:100%}
body{font-family: 'Tajawal', sans-serif;margin-bottom:200px}
footer{position:absolute;bottom:0;height:40px}

</style>
</head>
<body style="background:#f9f9f9;font-family: 'Tajawal', sans-serif;">
<header>  
  <div id="logo" style="direction:ltr;"><a title="vibercutt" href="" class="logo" style="font-family: 'Tajawal', sans-serif;">instaviber</a><span class="badge badge-secondary">ص1.0</span></div>
</header>  
<section id="urlbox">

<? if ($post == ""){ ?>
   <h1>التحميل من الانستقرام</h1>
    <form method="post">
      <div id="formurl">
      <input type="url" name="link" style="font-family: 'Tajawal', sans-serif;" placeholder="ضع الرابط المقطع او الصورة هنا" required >
        <div id="formbutton">
          <input type="submit" style="font-family: 'Tajawal', sans-serif;" value="تحميل">
          
        <br />
        </div>
      </div>
      </form>
<?php
      } else {
    foreach($xml->children() as $body) { 
    
    
    if ($body->meta[22]['property'] == "og:video"){
        echo '
        <a href="'.$body->meta[22]['content'].'" class="btn btn-secondary btn-lg btn-block" target="_blank" download>تحميل المقطع</a>
        <br />
        <div class="embed-responsive embed-responsive-21by9">
              <iframe class="embed-responsive-item" src="'.$body->meta[22]['content'].'"></iframe>
                </div><br />';
                exit;
    }elseif ($body->meta[9]['property'] == "og:image"){
        echo '<a href="'.$body->meta[9]['content'].'" class="btn btn-secondary btn-lg btn-block" target="_blank" download>تحميل الصورة</a>
        <br />
        <img src="'.$body->meta[9]['content'].'" class="img-thumbnail">
        <br />';
        exit;
    }else{ ?>
        <div class="alert alert-danger" role="alert">
              هناك خطأ تاكد من أدخال رابط لمقطع الفيديو او صورة
                </div>
                
   <h1>التحميل من الانستقرام</h1>
    <form method="post">
      <div id="formurl">
      <input type="url" name="link" style="font-family: 'Tajawal', sans-serif;" placeholder="ضع الرابط المقطع او الصورة هنا" required >
        <div id="formbutton">
          <input type="submit" style="font-family: 'Tajawal', sans-serif;" value="تحميل">
          
        <br />
        </div>
      </div>
      </form>
      <br />
                <?
                 exit;
    }
    

}     
      }

?>
      <br />

</section>

      <footer class="blockquote-footer">
          <div class="d-inline"><kbd><i class="fas fa-horse-head"></i>
                      <a href="#">
                      <kbd>harran</kbd></a></kbd>
        <br />
          </div></footer>
 
</body>
</html>
