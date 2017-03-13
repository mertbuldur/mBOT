<link rel="stylesheet" type="text/css" href="css.css">
<?php 
include("start/mBot.php");
$mbot = new mBot();
if($_POST)
{
    $cmd = $_POST['cmd'];
    echo '<div class="command__response">'.$mbot->start($cmd).'</div>';
}
if(isset($cmd)){$inputCmd = $cmd;}else { $inputCmd = "Birşeyler girin..";}
?>

<form action="" method="POST">
<div class="command__area">

<div class="command__input">
<input type="text" name="cmd" value="<?=$inputCmd;?>">
</div>

<div class="command__button">
<button>Ok</button>
</div>

</div>
</form>