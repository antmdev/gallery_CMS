 <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard
                            <small>Subheading</small>
                        </h1>

            <!-- <?php //if($database->connection){echo "true";} ?> -->

            <?php
// //************************************************************************* 
// // HOW TO CONNECT TO DB AND RETURN SOMETHING

//                 $sql = "SELECT * FROM users WHERE id=1"; //make a query to DB and saved in variable $sql
//                 $result = $database->query($sql); //use method from our class and pass in the string from the variable above
//                 $user_found = mysqli_fetch_array($result); //pull out the results form the query using fetch_query and save the result to $user_found
//                 echo $user_found['username']; //use the reult as an array because this is what is returned

// //************************************************************************* 


                    $user = new User(); //istantiate the class (from user.php) so we can use the method
                    $result_set = $user->find_all_users();
                    while ($row = mysqli_fetch_array($result_set)) {
                    echo $row['username'] . "<br>";
                    }

                ?>

                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->