<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<?php
include("library.php");

noAccessForClerk();
noAccessForDoctor();
noAccessForNormal();

noAccessIfNotLoggedIn();

?>
<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<?php
$connect = mysqli_connect("localhost", "root", "", "loom");
$query = "SELECT * FROM pricelist ORDER BY id DESC";
$result_price = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> Võru loomakliinik</title>
    <link href="main.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

</head>
<body>
<div class="container">
    <div class="row">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="logout.php">Sodalis</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="register.php"><span class="glyphicon glyphicon-log-in"></span> Registreeri</a></li>
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logi välja</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
<!--        --><?php
//        if (isset($_SESSION['username'])) {
//            echo '<li class="nav-item" style="align-items: right;"> <a class="nav-link" href="logout.php">Logout</a>
//                  </li>';
//        }
//        ?>
    </div>
</div>
<div class="container my-container">
    <h1 align=center>Admini sisselogimine</h1>

    <?php
    if (isset($_POST['demail'])) {
        register($_POST['demail'],NULL ,NULL ,$_POST['dpassword'], $_POST['dfullname'], "doctors");
    }
    if (isset($_POST['DrDelEmail'])) {
        $i = delete("doctors", $_POST['DrDelEmail']);
    }
    if (isset($_POST['UsrDelEmail'])) {
        $i = delete("users", $_POST['UsrDelEmail']);
    }

    ?>
    <div class="row my-row1">
    <div class="col-md-6" id="register1">
        <form method="post" action="admin_home.php">
            <h2>Arsti registreerimine</h2>
            <div class="form-group">
                <label for="usr">Täisnimi:</label>
                <input type="text" class="form-control" name="dfullname" required>
            </div>

            <div class="form-group">
                <label for="usr">Email:</label>
                <input type="email" class="form-control" name="demail" required>
            </div>

            <div class="form-group">
                <label for="pwd">Salasõna:</label>
                <input type="password" class="form-control" name="dpassword" required>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Register">
                <input type="reset" name="" class="btn btn-danger"></button>
            </div>
        </form>
        <form method="post" action="admin_home.php">

            <div class="form-group">
                <h2>Arsti kustutamine</h2>
                <select class='form-control' required value=1 name="DrDelEmail">

                    <?php
                    $result = getListOfEmails('doctors');

                    if (is_bool($result)) {
                        echo "No doctors found in database";
                    } else {
                        while ($row = $result->fetch_array()) {
                            echo "<option value='" . $row['email'] . "'>" . $row['email'] . "</option>";
                        }
                        echo '&emsp;';

                    }

                    ?>
                </select></div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Delete">
            </div>
        </form>
        <form method="post" action="admin_home.php">

            <div class="form-group">
                <h2>Kasutaja kustutamine</h2>
                <select class='form-control' required value=1 name="UsrDelEmail">

                    <?php
                    $result = getListOfEmails('users');

                    if (is_bool($result)) {
                        echo "No users found in database";
                    } else {
                        while ($row = $result->fetch_array()) {
                            echo "<option value='" . $row['email'] . "'>" . $row['email'] . "</option>";
                        }
                        echo '&emsp;';

                    }

                    ?>
                </select></div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Delete">
            </div>
        </form>
    </div>
    </div>
    <div>
        <div class="table-responsive">
            <h3 align="center">Hinnakirja muutmine</h3><br />
            <div id="live_data"></div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            function fetch_data()
            {
                $.ajax({
                    url:"select_price.php",
                    method:"POST",
                    success:function(data){
                        $('#live_data').html(data);
                    }
                });
            }
            fetch_data();
            $(document).on('click', '#btn_add', function(){
                var item_name = $('#item_name').text();
                var extra_info = $('#extra_info').text();
                var item_price = $('#item_price').text();
                if(item_name == '')
                {
                    alert("Sisesta toote nimetus");
                    return false;
                }
                if(extra_info == '')
                {
                    alert("Sisesta toote kirjeldus");
                    return false;
                }
                if(item_price == '')
                {
                    alert("Sisesta hind");
                    return false;
                }
                $.ajax({
                    url:"insert_price.php",
                    method:"POST",
                    data:{item_name:item_name, extra_info:extra_info, item_price:item_price},
                    dataType:"text",
                    success:function(data)
                    {
                        alert(data);
                        fetch_data();
                        location.reload();
                    }
                })
            });
            function edit_data(id, text, column_name)
            {
                $.ajax({
                    url:"edit_price.php",
                    method:"POST",
                    data:{id:id, text:text, column_name:column_name},
                    dataType:"text",
                    success:function(data){
                        alert(data);
                    }
                });
            }
            $(document).on('blur', '.item_name', function(){
                var id = $(this).data("id1");
                var item_name = $(this).text();
                edit_data(id, item_name, "item_name");
            });
            $(document).on('blur', '.extra_info', function(){
                var id = $(this).data("id2");
                var extra_info = $(this).text();
                edit_data(id,extra_info, "extra_info");
            });
            $(document).on('blur', '.item_price', function(){
                var id = $(this).data("id3");
                var item_price = $(this).text();
                edit_data(id,item_price, "item_price");
            });
            $(document).on('click', '.btn_delete', function(){
                var id=$(this).data("id4");
                if(confirm("Are you sure you want to delete this?"))
                {
                    $.ajax({
                        url:"delete_price.php",
                        method:"POST",
                        data:{id:id},
                        dataType:"text",
                        success:function(data){
                            alert(data);
                            fetch_data();
                        }
                    });
                }
            });
        });
    </script>
</div>
<div class="container footer">
    <hr>
    <footer>
        <p align="right">
            <?php
            if (!isset($_SESSION['username'])) {
                echo '<a class="nav-link" href="hms-staff.php">Töötajate sisselogimine</a>
                  </li>';
            }
            ?>
        </p>
        </nav>
        </p>
    </footer>
</div>
</body>
</html>


