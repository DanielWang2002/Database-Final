<!DOCTYPE html>

<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />

    <!--====== Title ======-->
    <title>資料庫系統 | 登入</title>

    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!--====== Favicon Icon ======-->
    <link
      rel="shortcut icon"
      href="assets/images/favicon.png"
      type="image/png"
    />

    <!--====== Tiny Slider CSS ======-->
    <link rel="stylesheet" href="assets/css/tiny-slider.css" />

    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="assets/css/LineIcons.css" />

    <!--====== Material Design Icons CSS ======-->
    <link rel="stylesheet" href="assets/css/materialdesignicons.min.css" />

    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

    <!--====== gLightBox CSS ======-->
    <link rel="stylesheet" href="assets/css/glightbox.min.css" />

    <!--====== nouiSlider CSS ======-->
    <link rel="stylesheet" href="assets/css/nouislider.min.css" />

    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="assets/css/default.css" />

    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>

  <body>

<?php
    if(isset($_REQUEST['email']))
    {
      $email=$_REQUEST['email'];
      $password=$_REQUEST['password'];

      include("connectdb.php");
      include("basic.php");
      $sql = "SELECT email,passwd,username FROM user where email='$email' and passwd='$password'";
      $result =$connect->query($sql);

      if($row = $result->fetch_assoc())
      {
        $id=$row['id'];
        $username=$row['username'];

        session_start();
        $_SESSION['email']=$email;
        $_SESSION['id']=$id;
        $_SESSION['username']=$username;

        switchto("main-page.php");

      }
      else  echo "帳號密碼錯誤！";


    }


?>
    


    <!--====== Navbar White Page Banner Part Ends ======-->

    <!--====== Login Part Start ======-->

    <section class="login-registration-wrapper pt-50 pb-100">
      <div class="container">
        <div class="row">
        <div class="col-lg-3"></div>
          <div class="col-lg-6">
            <div class="login-registration-style-1 mt-50">
              <h1 class="heading-4 font-weight-500 title">
                登入
              </h1>
              <ul>
                <li>
                  <a href="#0" class="facebook-login-registration"
                    ><i class="lni lni-facebook-original"></i>
                    <span>使用 Facebook 登入</span></a
                  >
                </li>
                <li>
                  <a href="#0" class="google-login-registration"
                    ><img src="assets/images/google-logo.svg" alt="" />
                    <span>使用 Google 登入</span></a
                  >
                </li>
              </ul>
              <p class="account">使用Email登入</p>
              <div class="login-registration-form pt-10">
                <form action="index.php" method='post'>
                  <div class="single-form form-default form-border">
                    <label>Email</label>
                    <div class="form-input">
                      <input type="email" name='email' placeholder="user@email.com" />
                      <i class="mdi mdi-email"></i>
                    </div>
                  </div>
                  <div class="single-form form-default form-border">
                    <label>密碼</label>
                    <a class="forget" href="#0">忘記密碼?</a>
                    <div class="form-input">
                      <input name='password'   id="password"   type="password"    placeholder="Password"/>
                      <i class="mdi mdi-lock"></i>
                      <span
                        toggle="#password-1"
                        class="mdi mdi-eye-outline toggle-password"
                      ></span>
                    </div>
                  </div>
                  <div class="single-checkbox checkbox-style-3">
                    <input type="checkbox" id="login-1" />
                    <label for="login-1"><span></span> </label>
                    <p>記住我</p>
                  </div>
                  <div class="single-form">
                    <button class="main-btn primary-btn">登入</button>
                  </div>
                </form>
              </div>
              <p class="login">
                還未擁有帳號嗎? <a href="signup.php">註冊</a>
              </p>
            </div>
          </div>