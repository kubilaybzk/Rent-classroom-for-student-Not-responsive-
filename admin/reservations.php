
<!doctype html>
<html lang="tr">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Required meta tags -->
    <meta name="robots" content="all, index, follow" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <title>Admin Page</title>

  </head>
  <body style="background-color: #f1f1f1;">

  <?php
                $connection = mysqli_connect("localhost","root","root");
                $db = mysqli_select_db($connection, 'project');

                $query = "SELECT * FROM rooms";
                $query_run = mysqli_query($connection, $query);

                session_start();
            ?>



                <table id="datatableid" class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th scope="col"> İD</th>
                            <th scope="col">Room_Name</th>
                            <th scope="col">Room_Cap </th>
                            <th scope="col"> Room_Text </th>
                            <th scope="col"> Room_Projector </th>
                            <th scope="col"> Room_Microphone </th>
                            <th scope="col"> Room_Sound_System </th>
                            <th scope="col"> Use_Type </th>
                            <th scope="col"> Room_Durumu </th>

                        </tr>
                    </thead>

                    <?php
                if($query_run)
                {
                    foreach($query_run as $satir)
                    {
                      $query2 = "SELECT * FROM room_speciess";
                      $query_run2 = mysqli_query($connection, $query2);
                      foreach($query_run2 as $satir2)
                      {
                        if($satir['id']==$satir2['room_id']){
                          $Room_Projector=$satir2['room_projector'];
                          $Room_Microphone=$satir2['room_microphone'];
                          $Room_Sound_System=$satir2['room_sound'];
                        }
                      }


                      $query3 = "SELECT * FROM room_types";
                      $query_run3 = mysqli_query($connection, $query3);
                      foreach($query_run3 as $satir3)
                      {
                        if($satir['id']==$satir3['room_id']){
                          $exam=$satir3['exam'];
                          $classrom=$satir3['classrom'];
                          $meeting=$satir3['meeting'];
                          if($meeting==1){
                            $Use_Type="Meeting";
                          }
                          else if ($classrom==1) {
                            $Use_Type="classrom";
                          }
                          else{
                            $Use_Type="exam";
                          }
                        }
                      }


            ?>
                      <tbody>
                        <tr>
                            <td> <?php echo $satir['id']; ?> </td>
                            <td> <?php echo $satir['Room_Name']; ?> </td>
                            <td> <?php echo $satir['Room_Cap']; ?> </td>
                            <td> <?php echo $satir['Room_Text']; ?> </td>
                            <td> <?php  if($Room_Projector==1){echo '✓';}else{echo 'X';}?> </td>
                            <td> <?php  if($Room_Microphone==1){echo '✓';}else{echo 'X';}?> </td>
                            <td> <?php  if($Room_Sound_System==1){echo '✓';}else{echo 'X';}?> </td>
                            <td> <?php echo $Use_Type; ?> </td>
                            <td> <?php  if($satir['Room_Durumu']==1){echo '✓';}else{echo 'X';}?> </td>
                            <td>
                                    <form action="roomDetails.php" method="post">

                                     <button type="button" class="btn btn-success editbtn" value="<?php $satır['id']?>"> <?php $_SESSION['id']= $satir['id']; ?>  <a href="roomDetails.php" target="roomDetails.php">EDIT</a> </button> </td>
                                    </form>

                        </tr>
                    </tbody>
                    <?php
                    }
                }
                else
                {
                    echo "No Record Found";
                }
            ?>



    <!--  -->


    <!--  -->

    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Details will be here
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    <!--  -->

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
  </body>
</html>
