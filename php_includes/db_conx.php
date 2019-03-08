<?php
$db_conx = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
    exit();

}
/* change character set to utf8 */
if (!$db_conx->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $db_conx->error);
}

?>