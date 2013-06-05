<?php
if ($_GET['randomId'] != "UWmR2_Wq_kJKFk7PaAGI2Niz525nQaH5v25F_JsiqvjDRslVahZisg1WUrYAPqrK") {
    echo "Access Denied";
    exit();
}

// display the HTML code:
echo stripslashes($_POST['wproPreviewHTML']);

?>  
