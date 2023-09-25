<?php
session_start();
$message="";
if(isset($_POST["Destroy"])){
    // echo("destroyed<br>");
    session_destroy();
    session_start();
    $message = "Session Destroyed";
}
?>


<?php
if(isset($_POST["Submit"])){
    // echo("submitted<br>");
    $k = array_keys($_POST);
    $tounset = [];
    for($y=0;$y<count($_POST);$y++){
        $s = substr($k[$y], 0, 4);
        $e = substr($k[$y], 4);
        // echo("<br>$s, $e");

        if($s=='key_'){
            if(isset($_SESSION[$e])){
                unset($_SESSION[$e]);
            }
            $_SESSION[$_POST[$k[$y]]]
            =$_POST["val_$e"];
        }
        if($s=='del_'){
            // echo("\ndeleted $e");
            array_push($tounset, $e);
        }
    }
    
    for($y=0;$y<count($tounset);$y++){
        unset($_SESSION[$tounset[$y]]);
    }
    
}

$keys = array_keys($_SESSION);

?>

<head>
    <script src="session_debug.js"></script>
</head>
<body>
    <h1>Session Debug</h1>
    <h3><?php echo "$message";?></h3>
    <button onclick="add_row();">Add Row</button>
    <button onclick="add_rows();">Add Multiple Rows:</button>
    <input type=number id=numRowsToAdd value=1 size=1>

    <form method=POST>
        <table id=maintable>
            <tr>
            <th>
                    Key
                </th>
                <th>
                    Value
                </th>
                <th>
                    Operations
                </th>
            </tr>
            <?php
            for($x=0;$x<count($keys);$x++){
                ?>
                <tr>
                    <td>
                        <input type=text name=key_<?php echo($keys[$x]) ?> value=<?php echo($keys[$x])?>>
                    </td>

                    <td>
                        <input type=text name=val_<?php echo($keys[$x]) ?> value=<?php echo($_SESSION[$keys[$x]])?>>
                    </td>

                    <td>
                        <input type=checkbox name=del_<?php echo($keys[$x]) ?> value=false>
                        Delete
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
        <input type=submit name=Submit value=Submit>
        <input type=submit name=Destroy value=Destroy>
    </form>

<?php
// print_r($_SESSION)

// session_destroy
?>