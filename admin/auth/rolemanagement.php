<?php

if ($_SESSION['role'] == 0) :

elseif ($_SESSION['role'] == 1) :

else :
?>
    <script>
        history.back();
    </script>

<?php

endif;


?>