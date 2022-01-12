<!DOCTYPE html>
<html>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
</style>
<body>

<form action="signup.php" style="border:1px solid #ccc">
  <div class="container">
    <h1>註冊帳號</h1>
    <p>請填寫以下表格註冊帳號。</p>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="example@email.com" name="email" required>

    <label for="psw"><b>密碼</b></label>
    <input type="password" placeholder="password" name="passwd" required>

    <label for="psw"><b>使用者名稱</b></label>
    <input type="text" placeholder="王小明" name="username" required>

    

    <div class="clearfix">
      <button type="button" class="cancelbtn">取消</button>
      <button type="submit" class="signupbtn">註冊</button>
    </div>
  </div>
</form>

</body>
</html>
<?php
    
    if (isset($_REQUEST['email'])){
        $email = $_REQUEST['email'];
        $passwd = $_REQUEST['passwd'];
        $username = $_REQUEST['username'];
        
        $sql="insert into user (email,passwd,username) values ('$email','$passwd','$username')";
        include("connectdb.php");
        include('dbutil.php');
        include('basic.php');
        execute_sql($sql);
        switchto("index.php");
    }

?>