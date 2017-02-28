<div class="alert alert-info" role="alert">
  <span>
    <?php
    if (isset($_POST["AddTransBTN"])) {
      $atPName = mysqli_real_escape_string($conn, $_POST["ProductName"]);
      $atPrice = mysqli_real_escape_string($conn, $_POST["ProductPrice"]);
      $atMoneyHanded = mysqli_real_escape_string($conn, $_POST["MoneyHanded"]);
      $atCurrency = mysqli_real_escape_string($conn, $_POST["Currency"]);
      addtrans($atPName, $atPrice, $atMoneyHanded, $atCurrency);
    }
    else {
    ?>
      <b>All transactions must be approved by the site administrator.</b>
    <?php
    }
    ?>
  </span>
</div>
<blockquote>
  <b>Transactions</b>
  <hr>
  <!--
  <div class = "form-group">
    <div class="alert alert-danger" role="alert"><span>The amount of money provided will be automatically multiplied by 1000</span></div>
  </div>
  -->
  <div class = "add-trans">
      <div class = "form-container">
        <div class = "calendar-holder">
          <! Calender to be added >
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
          <script src="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/a549aa8780dbda16f6cff545aeabc3d71073911e/src/js/bootstrap-datetimepicker.js"></script>
          <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>
          <link href="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/a549aa8780dbda16f6cff545aeabc3d71073911e/build/css/bootstrap-datetimepicker.css" rel="stylesheet"/>
          <! Calender start >
          <div class="form-group">
              <div class='input-group date' id='datetimepicker'>
                  <input type='text' class="form-control" />
                  <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                  </span>
              </div>
          </div>
          <script>
          $('#datetimepicker').datetimepicker();
          </script>
          <! Calender end >
        </div>
          <form method = "post" action = "index.php">
            <div class = "form-group">
                <input class = "form-control" type = "text" name = "ProductName" placeholder = "Product name">
            </div>
            <div class = "form-group">
                <input class = "form-control" type = "number" name = "ProductPrice" placeholder = "Product price">
            </div>
            <div class = "form-group">
                <input class = "form-control" type = "number" name = "MoneyHanded" placeholder = "Money handed">
            </div>
            <div class = "form-group">
              <select name = "Currency" class = "form-control">
                <option value = "LBP">L.L</option>
                <!-- <option value = "USD">&dollar;</option> -->
              </select>
            </div>
            <div class = "form-group">
              <input class = "btn btn-primary btn-block" type = "submit" name = "AddTransBTN"></input>
            </div>
          </form>
      </div>
  </div>
</blockquote>
