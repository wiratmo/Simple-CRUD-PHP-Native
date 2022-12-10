<?php
function notif($message,$status="success"){
    $status = $status == "error"? "danger": $status;
    if($status == 'success' or $status == 'danger' or $status == 'warning' or $status == 'info'){
        echo "<div class='alert alert-$status' role='alert'>
            $message
            </div>
        ";
    }
}
?>