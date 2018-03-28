<?php

if (isset($_POST['enviar']))
{
  $mostrar=$_POST['mostrar'];
  if($_POST['enviar']==1){
    //Si es 1 editamos conjunto de anuncios
    header("location: UpdateCOA.php?id=$mostrar");
  }elseif($_POST['enviar']==2) {
    //Si es 2 editamos anuncios
    header("location: UpdateANU.php?id=$mostrar");

  }
}
 ?>
