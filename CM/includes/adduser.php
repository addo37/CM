<div class="alert alert-info" role="alert">
  <span>
    <?php
    if (isset($_POST["AddUserBTN"])) {
      $auFName = mysqli_real_escape_string($conn, $_POST["FName"]);
      $auLName = mysqli_real_escape_string($conn, $_POST["LName"]);
      $auIncome = mysqli_real_escape_string($conn, $_POST["Income"]);
      $auCurrency = mysqli_real_escape_string($conn, $_POST["Currency"]);
      adduser($auFName, $auLName, $auIncome, $auCurrency);
    }
    else {
    ?>
    <b>All fields are required.</b>
    <?php
    }
    ?>
  </span>
</div>
<blockquote>
  <b>Add user</b>
  <hr>
  <div class = "add-user">
      <div class = "form-container">
          <div class = "user-list-holder">
            <?php
              userlist();
            ?>
          </div>
          <form method = "post" action = "adduser.php">
            <div class = "form-group">
              <input type = "text" class = "form-control" name = "FName" placeholder = "First name"></input>
            </div>
            <div class = "form-group">
              <input type = "text" class = "form-control" name = "LName" placeholder = "Last name"></input>
            </div>
            <div class = "form-group">
              <input type = "number" class = "form-control" name = "Income" placeholder = "Income"></input>
            </div>
            <div class = "form-group">
              <select name = "Currency" class = "form-control">
                <option value = "LBP">L.L</option>
                <option value = "USD">&dollar;</option>
              </select>
            </div>
            <div class = "form-group">
              <input type = "submit" class = "btn btn-primary btn-block" name = "AddUserBTN"></input>
            </div>
          </form>
      </div>
  </div>
</blockquote>
