
<!doctype html>
<html>
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="robots" content="all, index, follow" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css">   <!-- bootstrap entegre kodları -->
    <title>Admin Page- Medipol Reservation</title>

  </head>
  <body style="background-color: #fff;">

    <nav class="navbar sticky-top navbar-expand-lg navbar-dark" style="background-color: #fff;">
      <div class="container">
  <a style="color:#6747c7 ; class="navbar-brand" href="admin.php"><h2 id="FontHeader" >Mainpage</h2></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto" id="FontUL">

    </ul>

       <ul class="navbar-nav mr-auto" id="FontUL">
      <li class="nav-item">
        <a class="nav-link" style="color:#6747c7; id="active" href="../index.html" <?php session_destroy();?> >LOG OUT</a>
      </li>
        </ul>

  </div>
  </div>
</nav>
<br><br>

  <div class="container"> <!--  table1's headers-->
    <div class="row">
      <div class="col">
        <h5>Reservations Table</h5>
                <table class="table table-hover">
  <thead>
    <tr>
      <th>
      </th>
    </tr>
  </thead>
</table>
<iframe src="reservations.php" style="width: 100%; height: 300px; border-top: none; border-left: none;"></iframe>
      </div>
    </div>
  </div>







  <div class="container"> <!--  table2's headers-->
    <div class="row">
      <div class="col">
                <h5>User Table</h5>

                <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">User id</th>
      <th scope="col">Username</th>
      <th scope="col">User Mail</th>
      <th scope="col">User Fullname</th>
      <th scope="col">Details</th>
    </tr>
  </thead>
</table>
<iframe src="users.php" style="width: 100%; height: 300px; border-top: none; border-left: none;"></iframe> <!-- tablo imported-->
      </div>
    </div>
  </div>


<form action="rooms.php" method="post" >



  <div class="container" style=" background-color: #4527A0; ">
    <div class="row" >
      <div class="col" style="border-top:2px solid #1976D2; border-right: 2px solid #1976D2;">
        <br>
              <h5 style="color:#fff;">Add New Room</h5>
        <div class="row">
          <div class="col">

          <layer style="font-weight: bold; color:#fff;">Room Name: <input type="text" name="Room_Name" style="background-color: #f1f1f1; width: 100%;"></layer>
          <br>
          <layer style="font-weight: bold; color:#fff;">Capacity: <input type="number" name="Room_Capacity" style="background-color: #f1f1f1 ; width: 100%;"></layer>
          <br>
          <textarea style="width: 100%; height: 85px; background-color: #f1f1f1;" name="Room_textarea"></textarea>
      <p></p>


          </div>
          <div class="col-xs " >

          <div class="custom-control custom-checkbox">
		            <layer style="font-weight: bold; color:#fff;">Utilities</layer>

    <input type="checkbox" class="custom-control-input" id="customCheck1" name="Room_Elements1" value="Projector">
    <label class="custom-control-label" for="customCheck1" style="font-weight: bold; color:#fff;">Projector</label>
  </div>
  <div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="customCheck2" name="Room_Elements2" value="Microphone">
    <label class="custom-control-label" for="customCheck2" style="font-weight: bold; color:#fff;">Microphone</label>
  </div>
  <div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="customCheck3" name="Room_Elements3" value="Sound System">
    <label class="custom-control-label" for="customCheck3" style="font-weight: bold; color:#fff;">Sound System</label>
  </div>
  <br><br><br>
  <button type="submit" class="btn btn-primary"  name="gonder" style="width: 140%;   font-weight: bold; font-size: 20px;" value="Kaydet">Add Room</button>

          </div>
		  <div class="col">


          <div class="custom-control custom-checkbox">
		            <layer style="font-weight: bold; color:#fff;">Type</layer>

                <input type="radio" name="Type" value="Meeting"> <label  for="customCheck1" style="font-weight: bold; color:#fff;">Meeting</label><br>

                <input type="radio" name="Type" value="Classroom"> <label  for="customCheck1" style="font-weight: bold; color:#fff;">Classroom</label><br>

                <input type="radio" name="Type" value="Exam"> <label  for="customCheck1" style="font-weight: bold; color:#fff;">Exam</label><br>

  </div>



          </div>
  <br><br><br>


          </div>
        </div>

      </div>



</form>


<br>
      </form>
      </div>











    </div>
  </div>
</div>
<br><br><br><br><br>



   <!-- bootstrap entegre kodları -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
  </body>
</html>
