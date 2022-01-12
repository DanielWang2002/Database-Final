<?php
function closedb()
{
    global $connect;
    $connect->close();
}

function execute_sql($sql)
{
    global $connect;

    if ($connect->query($sql) === TRUE) {
        echo "";
        } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
        }

}
?>