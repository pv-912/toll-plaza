<?php
    require_once '../config/config.php';
    session_start();
    
    $_SESSION = array();
    session_destroy();
    // ob_end_flush();/
    echo '
        <script>
            window.location.href="'.base_url_user.'"; 
        </script>';
    exit;
?>
