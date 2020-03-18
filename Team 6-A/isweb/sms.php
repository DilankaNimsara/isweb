<head>
 <title>SMS verification</title>
 <link rel="stylesheet" type="text/css" href="signupCss.css">

</style>

</head>
<body background="img/wall.jpg">
  <div align = "center" >
    <div style = "width:600px; border: solid 1px #333333; " align = "left">
     <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Authorization</b></div>

     <div style = "margin:30px">
      <form action="controllers/sms.php" method="post" style="border:1px solid ##515151">
        <div class="container">
          <h1>SMS Verification</h1>

          <label for="email"><b>Email</b></label>
          <input type="text" palceholder="Enter email" name="email" required>

          <label for="smscode"><b>SMS-code</b></label>
          <input type="text" placeholder="Enter sms-code" name="smscode" required>

          <label for="pswrd"><b>Add a Password</b></label>
          <input type="password" placeholder="Password" name="pswrd" required>

          <label for="pswrd-repeat"><b>Repeat the password</b></label>
          <input type="password" placeholder="Repeat password" name="pswrd_repeat" required>

          <div class="buttons">
            <button type="submit" class="submitbtn">Submit</button>
          </div>

        </div>  

      </form>
    </div>
  </div>
</div>
</body>