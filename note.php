<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <title>My_Note</title>
</head>

<body>
    <?php require 'nav.php' ?>

    <!-- //navbar//

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/loginsystem">My_Note</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="note.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="signup.php">Signup</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
       
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav> -->

    <!-- Note form  -->


    <div class="container col-md-7">
        <form method="post">
            <h2 class="text-center m-3">My_Note</h2>
            <div class="form-group">
                <label for="title">Title*</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" required placeholder="Enter Note Title">
            </div>
            <div class="form-group">
                <label for="Desc">Description*</label>
                <textarea class="form-control" name="desc" id="desc" rows="5" required placeholder="Enter Note  Description"></textarea>
            </div>
            <button type="submit" id="submit" name="submit" class="btn btn-primary">Add Note</button>
        </form>


        <!-- showing data into the table  -->


        <?php
        $login = false;
        if ($login) {
            require("config.php");
            if (isset($_POST['submit'])) {

                $title = $_POST['title'];
                $desc = $_POST['desc'];

                $sql = "INSERT INTO `add_note` (`Title`, `Description`, `Date_Time`) VALUES ('$title', '$desc', current_timestamp())";
                $result = mysqli_query($con, $sql);
            }
        }
        ?>
        <hr>
    </div>
    <div class="container col-md-7 my-4 ">
        <h2 class="text-center m-5">Your Notes </h2>
        <table class="table table-striped table-bordered" id="myTable">
            <thead>
                <th>S_No</th>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </thead>
            <tbody>
                <?php
                $row = ("SELECT * FROM `add_note`");
                $row_count = mysqli_query($con, $row);
                $no = 1;
                while ($datafetch = mysqli_fetch_assoc($row_count)) {
                    echo "<tr>
                     <td>" . $no . "</td>
                     <td>" . $datafetch['Title'] . "</td>
                     <td>" . $datafetch['Description'] . "</td>
                     <td><button type='button'class='btn btn-sm btn-secondary data-toggle='modal' data-target='#exampleModal'>Edit</button> <a class='btn btn-sm btn-secondary' href='/del'>Delete</a></td>
                     </tr>";
                    $no += 1;
                }
                ?>
            </tbody>
        </table>
        <!-- Button trigger modal -->
        <!-- <button type='button' class="btn btn-primary" data-toggle='modal' >
  Launch demo modal
</button> -->

        <!-- Edit Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script>
        src = "//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"
    </script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>