<blockquote>
  <b>Sign in</b>
  <hr>
  <div class = "sign-in">
      <div class = "form-container">
        <div class = "picture-holder">
          <! Picture to be added >
        </div>
        <form method = "post" action = "signin.php">
          <div class = "form-group">
            <p>
              <?php
              if (isset($_POST["SignInBTN"])) {
                $SIFName = mysqli_real_escape_string($conn, $_POST["FName"]);
                $SILName = mysqli_real_escape_string($conn, $_POST["LName"]);
                signinfn($SIFName, $SILName);
              }
              ?>
            </p>
          </div>
            <div class = "form-group">
                <input class = "form-control" type = "text" name = "FName" placeholder = "First Name">
            </div>
            <div class = "form-group">
                <input class = "form-control" type = "text" name = "LName" placeholder = "Last Name">
            </div>
            <div class = "form-group">
              <input class = "btn btn-primary btn-block" type = "submit" name = "SignInBTN"></input>
            </div>
        </form>
      </div>
  </div>
</blockquote>
