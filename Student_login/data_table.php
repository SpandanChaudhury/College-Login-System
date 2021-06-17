<?php 
session_start();
include "connection_student.php";

$query = "SELECT P.*, A.BRANCH, A.YEAR_OF_STUDY FROM PERSONAL P, ACADEMICS A WHERE A.SIC = P.SIC";
$tbl_link = mysqli_query($conn, $query); 
// $res = mysqli_fetch_array($tbl_link);
// echo "<pre>";
// print_r($res);
// exit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
<link rel='stylesheet' href = "https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css"> 
<!-- <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"> -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

   
    <title>Data</title>


    <style>
        #msg{
            background-color: lightblue;
        }

    </style>
</head>
<body>
<br><br>
    <center>
        <?php if(isset($_SESSION['error_edit'])) {?>
            <h3 style="color:red">  <?php echo $_SESSION['error']; unset($_SESSION['error_edit']); ?> </h3>
        <?php } ?>
        <?php if(isset($_SESSION['success'])){ ?>
            <h3 style = "color:green"> <?php echo $_SESSION['success'];  unset($_SESSION['success']);?> </h3>
        <?php } ?>
        <?php if(isset($_SESSION['error_del'])){ ?>
            <h3 style="color:red"> <?php echo $_SESSION['error_del'];  unset($_SESSION['error_del']);?> </h3>
        <?php } ?>
        <?php if(isset($_SESSION['del_success'])){ ?>
            <h3 style="color:green"> <?php echo $_SESSION['del_success'];  unset($_SESSION['del_success']);?> </h3>
        <?php } ?>
    </center>
    <div class="container text-center" id="msg">
        <h1><em> Welcome to the Data Table </em></h1>
    </div>
    <br><br>
    <div>
        <table class="table display table-primary" id="a" >
            <thead>
                <tr>
                    <th> SIC </th>
                    <th> First Name </th>
                    <th> Last Name </th>
                    <th> Guardian's Name </th>
                    <th> Guardian relation </th>
                    <th> Address </th>
                    <th> Gender</th>
                    <th> dob </th>
                    <th> age </th>
                    <th> student mail id </th>
                    <th> guardian mail id</th>
                    <th> student contact number </th>
                    <th> guardian contact number</th>
                    <th> image path </th>
                    <th> Alternate number </th>
                    <th> Branch </th>
                    <th> Year </th>
                    <th> Facilities </th>
                    <th>Edit/Delete </th>
                </tr>
            </thead>
            <tbody>
            <?php  while($result = mysqli_fetch_array($tbl_link)){
                    $x = $result['SIC'];
                    // echo $x;
                    $fquery = "SELECT GROUP_CONCAT(FACILITY_NAME) FROM FACILITY_MASTER WHERE FNO IN (SELECT FNO FROM FACILITY WHERE SIC = $x)";
                    // echo $fquery;
                    $f_link = mysqli_query($conn, $fquery);
                    $f_res = mysqli_fetch_array($f_link);
                    // print_r($f_res);
                    // exit;
                    $faciiity = $f_res[0];
                    ?>
                <tr>
                    <td><?php  echo $result['SIC'] ?></td>
                    <td><?php echo $result['FIRST_NAME'] ?></td>
                    <td> <?php  echo $result['LAST_NAME'] ?></td>
                    <td> <?php  echo $result['GUARDIAN_NAME'] ?></td>
                    <td><?php echo $result['RELATION'] ?></td>
                    <td><?php  echo $result['ADDRESS'] ?></td>
                    <td> <?php echo $result['GENDER'] ?></td>
                    <td> <?php echo $result['DOB'] ?></td>
                    <td> <?php echo $result['AGE'] ?></td>
                    <td> <?php echo $result['Student_email_id'] ?></td>
                    <td> <?php echo $result['Guardian_email_id'] ?></td>
                    <td><?php echo $result['STUDENT_CONTACT_NUM'] ?></td>
                    <td> <?php echo $result['GUARDIAN_CONTACT_NUM'] ?></td>
                    <td> <?php echo $result['IMAGE_PATH'] ?></td>
                    <td> <?php echo $result['ALTERNATE_NUM'] ?></td>
                    <td><?php echo $result['BRANCH'] ?></td>
                    <td><?php echo $result['YEAR_OF_STUDY'] ?> </td>
                    <td><?php echo $faciiity ?> </td>
                    <td><a href="edit.php?sic=<?php echo $result['SIC']?>">Edit</a>/<a href="delete.php?id=<?php echo $result['SIC']?>">Delete</a> </td>
            
                </tr>
            <?php } ?>
            </tbody>
        
        </table>
    </div>

    <div>
        <a href="admin_login.php">Back</a>
            </div>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        

    <script>
        $(document).ready(function() {
    $('#a').DataTable( {
        dom: 'Bfrtip',
        buttons: [
    'csv', 'excel', 'pdf'
        ]
    } );
    } );
    </script>
    
</body>



</html>