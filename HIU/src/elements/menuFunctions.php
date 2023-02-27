<?php 
function navItem(String $lien,String $titre):String
{
  $class = 'nav-link';
  if ($_SERVER['SCRIPT_NAME']===$lien){
    $class .= ' active';
  }
  return <<<HTML
  <li class="nav-item">
          <a class="$class" href="$lien">$titre</a>
        </li> 
HTML;
}
?> 