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
      <! Calender to be added >
      <div class = "form-container">
        <form name="calControl" onSubmit="return false;" method="post">
          <div class = "form-group">
            <select class = "form-control" name="month" onChange="selectdate()">
              <option>January</option>
              <option>February</option>
              <option>March</option>
              <option>April</option>
              <option>May</option>
              <option>June</option>
              <option>July</option>
              <option>August</option>
              <option>September</option>
              <option>October</option>
              <option>November</option>
              <option>December</option>
            </select>
          </div>
          <div class = "form-group">
            <input type = "text" class = "form-control" name = "year"  size = "4" maxlength = "4">
          </div>
          <div class = "form-group">
            <input type = "button" class = "btn btn-primary btn-block" name = "Go" value = "Select Date" onClick="selectDate()">
          </div>
        </form>
      </div>
      <div class = "form-container">
        <form name = "calButtons" method="post">
          <div class = "form-group">
            <label>Days: </label>
            <textarea font = "Courier" class = "area_style" name = "calPage" WRAP = "no" rows = "7" disabled></textarea>
          </div>
          <div class = "form-group">
  					<input type = "button" class = "btn_nav" name = "previousYear" value = " <<  "  onClick = "setPreviousYear()">
  					<input type = "button" class = "btn_nav" name = "previousYear" value = "  <  "  onClick = "setPreviousMonth()">
  					<input type = "button" class = "btn_nav" name = "previousYear" value = "Today"  onClick = "setToday()">
  					<input type = "button" class = "btn_nav" name = "previousYear" value = "  >  "  onClick = "setNextMonth()">
  					<input type = "button" class = "btn_nav" name = "previousYear" value = "  >> "  onClick = "setNextYear()">
          </div>
        </form>
      </div>
      <! Calender end >
    <div class = "form-container">
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
