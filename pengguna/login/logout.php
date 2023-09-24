<?php
    session_start();
    session_destroy();
    echo "<script>location='../../index.html'</script>";
?>