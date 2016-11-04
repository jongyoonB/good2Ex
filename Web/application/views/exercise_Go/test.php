<script>
    var a=0;
    function plusA(){
        a++;
        return a;
    }
</script>

<?php
    echo "TEST<br>";
    $temp = 0;
    echo $temp;

    $temp = '<script>document.write(plusA())</script>';

    echo $temp;
?>


