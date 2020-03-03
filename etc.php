<?php
for ($i=0; $i <90000 ; $i++) {

$oku = posix_getpwuid($i);
if (!empty($oku)) {
             while (list ($key, $cavdar) = each($oku))
             {
print "$cavdar";
}

print "<br/>";
}
}






?>
