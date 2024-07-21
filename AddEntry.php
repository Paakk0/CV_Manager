<?php
if (isset($_POST['send'])) {
    if (isset($_POST['valueUni'])) {
        echo 'something';
        $sql = 'INSERT INTO Universities(UNI_NAME) VALUES("' . $_POST['valueUni'] . '")';
        $result = mysqli_query($conn, $sql) or die('Cound not insert into Universities: ' . mysqli_error($conn));
    } else if (isset($_POST['valueTech'])) {
        $sql = 'INSERT INTO Technologies(TECH_NAME) VALUES("' . $_POST['valueTech'] . '")';
        $result = mysqli_query($conn, $sql) or die('Cound not insert into Technologies: ' . mysqli_error($conn));
    }
}
