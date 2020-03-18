<head>
 <title>Login Page</title>
 <link rel="stylesheet" type="text/css" href="signupCss.css">

</style>

</head>
<body background="img/wall.jpg">
  <div align = "center" >
    <div style = "width:600px; border: solid 1px #333333; " align = "left">
     <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Signup</b></div>

     <div style = "margin:30px">
      <form action="controllers/signup.php" style="border:1px solid #ccc" method="post">
        <div class="container">
          <h1>Sign Up</h1>
          <p>Please fill in this form to create an account.</p>
          <hr>

          <label for="email"><b>Email</b></label>
          <input type="email" placeholder="abc@ucsc.lk" name="email" required>

          <label for="nic"><b>NIC</b></label>
          <input type="text" placeholder="xxxxxxxxxV" name="nic" required>

          <label for="name"><b>Name</b></label>
          <input type="text" name="names" required>

          <label for="address"><b>Address</b></label>
          <input type="text" name="address">

          <label for="tp"><b>Mobile Number</b></label>
          <input type="text" placeholder="94xxxxxxxxx" name="tp" required>

          <label for="type"><b>Who are you</b></label>
          <select name="type">
            <option value="1">Admin</option>
            <option value="2">Employer</option>
            <option value="3">Job Seeker</option>
          </select>

          <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

          <div class="clearfix">
            <button type="reset" class="cancelbtn">Cancel</button>
            <button type="submit" class="signupbtn">Sign Up</button>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
</body>