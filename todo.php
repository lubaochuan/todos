<form>
  <input name='new_item'/>
  <input type="submit"/>
</form>

<form>
  <input name='delete_index'/>
  <input type="submit" value="Delete"/>
</form>
<ol>
  
New item:<?=$_REQUEST["new_item"]?>
<br/>
Delete item:<?=$_REQUEST["delete_index"]?>
<?php

$index = $_REQUEST["delete_index"];
if (isset($index)){
  $lines = file("todo.txt");
  file_put_contents("todo.txt", "");
  for($i=0; $i<count($lines); $i++){
    if($i != ($index)){
      file_put_contents("todo.txt", $lines[$i], FILE_APPEND);
    }
  }
}

if (isset($_REQUEST["new_item"]) 
  && strlen($_REQUEST["new_item"])){
  file_put_contents("todo.txt", 
    "\n".$_REQUEST["new_item"], FILE_APPEND);
}

$todos = file("todo.txt");
for($i=0; $i<count($todos); $i++){
?>
  <li><?=$todos[$i]?> 
  <a href="todo.php/?delete_index=<?=$i?>">[delete]</a></li>
<?php
}
?>
</ol>