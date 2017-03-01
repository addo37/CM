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
          <form name="calControl" onSubmit="return false;" method="post">
          <table cellpadding="0" cellspacing="0" border="0">
          	<tr>
          		<td colspan=7>
          			<select class="month_style" name="month" onChange="selectdate()">
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
          			<input type=text class="year_style" name="year"  size=4 maxlength=4>
          			<input type="button" class="build_style" name="Go" value="Go to!" onClick="selectDate()">
          		</td>
          	</tr>
          </form>
          <form name="calButtons" method="post">
          	<tr>
          		<td>
                <textarea font="Courier" class="area_style" name="calPage" WRAP=no rows=8 cols=22 disabled></textarea>
              </td>
        			<tr>
        				<td>
        					<input type=button class="btn_nav" name="previousYear" value=" <<  "  onClick="setPreviousYear()">
        					<input type=button class="btn_nav" name="previousYear" value="  <  "  onClick="setPreviousMonth()">
        					<input type=button class="btn_nav" name="previousYear" value="Today"  onClick="setToday()">
        					<input type=button class="btn_nav" name="previousYear" value="  >  "  onClick="setNextMonth()">
        					<input type=button class="btn_nav" name="previousYear" value="  >> "  onClick="setNextYear()">
        				</td>
        			</tr>
          	</tr>
          </table>
          </form>
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
