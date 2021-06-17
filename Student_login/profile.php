<?php 
session_start(); $path = $_COOKIE['path'];
 include "connection_student.php";
// echo $_SESSION['SIC'];
$x = $_COOKIE['SIC'];
$query1 = "SELECT * FROM PERSONAL WHERE SIC = $x";
$query2 = "SELECT * FROM ACADEMICS A WHERE A.SIC = $x";
$query3 = "SELECT GROUP_CONCAT(FACILITY_NAME) FROM FACILITY_MASTER WHERE FNO IN (SELECT FNO FROM FACILITY WHERE SIC = $x)";
// echo $query;
$tbl_link = mysqli_query($conn, $query1);
$query_result = mysqli_fetch_array($tbl_link);
$a_link = mysqli_query($conn, $query2);
$a = mysqli_fetch_array($a_link);
$f_link = mysqli_query($conn, $query3);
$f = mysqli_fetch_array($f_link);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <title>Profile page</title>
    <style>
        body{
            background-color: dimgrey;
        }
        td{
            text-align: center;
        }
    </style>
</head>
<body>
    
    <nav class="navbar navbar-light bg-secondary">
        <div class="container-fluid">

          <a class="navbar-brand" href="profile.html" style="text-align:left;">
            <img src="<?php echo $path; ?>" alt="Student_image" width="38" height="38" style="border-radius:50%" class="d-inline-block align-text-top">
           <?php echo $query_result['FIRST_NAME']; ?>
          </a>
          <h3> <?php echo $query_result['FIRST_NAME']?>'s Profile </h3>
          <a href="session_dest_roy.php"><button type="button" id="out" class="btn btn-dark">Log Out</button></a>
        </div>
        
    </nav>
    <a href="logged_in.php"><p><strong>Home </strong></p></a>
    <hr>

    <div class="container" id='top'>
        <h4>Personal details </h4>
        <table class="table table-striped table-dark">
            <thead></thead>
            <tbody>
              <tr>
                <th>Student's name</th>
                <td><?php echo $query_result['FIRST_NAME']. ' '. $query_result['LAST_NAME']; ?></td>
              </tr>
              <tr>
                  <th>SIC</th>
                  <td><?php echo $x; ?></td>
              </tr>
              <tr>
                  <th>Gender</th>
                  <td>
                    <?php $g = $query_result['GENDER'];
                        $msg = ($g == 'M')?"Male":(($g == "F")? "Female":"Others");
                        echo $msg;
                    ?>
                  </td>
              </tr>
              <tr>
                  <th>Date of Birth</th>
                  <td> <?php echo $query_result['DOB']; ?></td>
              </tr>
              <tr>
                  <th>Age</th>
                  <td> <?php echo $query_result['AGE']; ?></td>
              </tr>
              <tr>
                <th scope="row">Guardian's Name</th>
                <td><?php echo $query_result['GUARDIAN_NAME']; ?></td>
              </tr>
              <tr>
                <th scope="row">Guardian's Relation with Student</th>
                <td><?php echo $query_result['RELATION']; ?></td>
              </tr>
              <tr>
                  <th scope="row">Student email id</th>
                  <td><?php echo $query_result['Student_email_id']; ?></td>
              </tr>
              <tr>
                  <th>Guardian's email id</th>
                  <td><?php echo $query_result['Guardian_email_id']; ?></td>
              </tr>
              <tr>
                  <th>Student contact number </th>
                  <td> <?php echo $query_result['STUDENT_CONTACT_NUM']; ?></td>
              </tr>
              <tr>
                  <th>Guardian's contact number </th>
                  <td> <?php echo $query_result['GUARDIAN_CONTACT_NUM']; ?></td>
              </tr>
              <tr>
                  <th>Alternate Number </th>
                  <td style="color:red"> 
                    <?php $msg = ($query_result['ALTERNATE_NUM'] == NULL)?"NA": $query_result['ALTERNATE_NUM'];
                    echo $msg; ?>
                 </td>
              </tr>
              <tr>
                  <th>Address</th>
                  <td> <?php echo $query_result['ADDRESS']; ?></td>
              </tr>
            </tbody>
        </table>
        <hr><hr>

        <h4> Academic Details </h4>
        <table class="table table-striped table-dark">
            <thead></thead>
            <tbody>
                <tr>
                    <th>Branch</th>
                    <td> <?php echo $a['BRANCH']; ?></td>
                </tr>
                <tr>
                    <th> Year of Study </th>
                    <td>
                    <?php 
                        $x = $a['YEAR_OF_STUDY'];
                        $s = ($x == 1)?'1st year':(($x == 2)? '2nd year':(($x == 3)?'3rd year': '4th year'));
                        echo $s;
                    ?>
                    
                    </td>
                </tr>
                <tr> 
                    <th>Facilities Availed</th>
                    <td>
                    <?php 
                        $x = $f[0];
                        // if($fa['BUS'] == 'Y')
                        //     $x .= 'Bus,';
                        // if($fa['MESS'] == 'Y')
                        //     $x .= ' Mess,';
                        // if($fa['GYM'] == 'Y')
                        //     $x .= " Gym ";
                        // if($x == '')
                        //     $x = 'NIL ';
                        // echo substr($x, 0, -1);
                        echo $x;
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <div style="text-align:right">
            <a href="change.php"><button type='button' id='pswrd_change' class='btn btn-secondary'>Change Password? </button></a>
        </div>
       
       

    </div>
    <a href='#top'style="color:red">Back to Top </a>
</body>
</html>



