<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="bootstrap-3.3.2\dist\css\bootstrap.css"> <!--css file link in bootstrap folder-->
    <title>View Users</title>
</head>
<style>
    .login-panel {
        margin-top: 150px;
    }
    .table {
        margin-top: 50px;

    }

</style>

<body>

<div class="table-scrol">
    <h1 align="center">All the Users</h1>

    <div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->


        <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">
            <thead>

            <tr>


                <th>User Name</th>
                <th>User E-mail</th>
                <th>User Pass</th>
                <th>Delete User</th>
            </tr>
            </thead>

            <?php
            $dbcon=mysqli_connect("localhost","root","admin");
            mysqli_select_db($dbcon,"users");
            $view_users_query="select * from users";//select query for viewing users.
            $run=mysqli_query($dbcon,$view_users_query);//here run the sql query.

            while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.
            {

                $user_name=$row[0];
                $user_email=$row[1];
                $user_pass=$row[2];



                ?>

                <tr>
                    <!--here showing results in the table -->

                    <td><?php echo $user_name;  ?></td>
                    <td><?php echo $user_email;  ?></td>
                    <td><?php echo $user_pass;  ?></td>
                    <td><a href="Delete.php?del=<?php echo $user_id ?>"><button class="btn btn-danger">Delete</button></a></td> <!--btn btn-danger is a bootstrap button to show danger-->
                </tr>

            <?php } ?>

        </table>
    </div>
</div>


</body>

</html>  