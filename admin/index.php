<?php include'include/config.php'; ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> KurdSource </title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="wrapper">
      <div class="title">لێگەڕیانا کوردى</div>
      <form action="extra/login.php" method="POST">
        <div class="field">
          <input type="email" name="email">
          <label>Email Address</label>
        </div>
        <div class="field">
          <input type="password" name="password">
          <label>Password</label>
        </div>
        <div class="field">
          <button name="login"> چوونە ژوور </button>
          
        </div>
      </form>
    </div>

    <style>
        *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Droid Arabic Kufi",sans-serif;
}
html,body{
  display: grid;
  height: 100%;
  width: 100%;
  place-items: center;
  background: #f2f2f2;
  /* background: linear-gradient(-135deg, #c850c0, #4158d0); */
}
::selection{
  background: #4158d0;
  color: #fff;
}
.wrapper{
  width: 380px;
  background: #fff;
  border-radius: 15px;
  box-shadow: 0px 15px 20px rgba(0,0,0,0.1);
}
.wrapper .title{
  font-size: 35px;
  font-weight: 600;
  text-align: center;
  line-height: 100px;
  color: #fff;
  user-select: none;
  border-radius: 15px 15px 0 0;
  background: linear-gradient(-135deg,  #21325E, #4158d0);
}
.wrapper form{
  padding: 10px 30px 50px 30px;
}
.wrapper form .field{
  height: 50px;
  width: 100%;
  margin-top: 20px;
  position: relative;
}
.wrapper form .field button , .wrapper form .field input{
  height: 100%;
  width: 100%;
  outline: none;
  font-size: 17px;
  /* padding-left: 20px; */
  border: 1px solid lightgrey;
  border-radius: 25px;
  transition: all 0.3s ease;
}
.wrapper form .field input{
    padding-left: 17px;
}
.wrapper form .field input:focus,
form .field input:valid{
  border-color: #4158d0;
}
.wrapper form .field label{
  position: absolute;
  top: 50%;
  left: 20px;
  color: #999999;
  font-weight: 400;
  font-size: 17px;
  pointer-events: none;
  transform: translateY(-50%);
  transition: all 0.3s ease;
}
form .field input:focus ~ label,
form .field input:valid ~ label{
  top: 0%;
  font-size: 16px;
  color: #4158d0;
  background: #fff;
  transform: translateY(-50%);
}
form .field button{
  color: #fff;
  border: none;
  padding-left: 0;
  margin-top: -10px;
  font-size: 20px;
  font-weight: 500;
  cursor: pointer;
  background: linear-gradient(-135deg, #21325E, #4158d0);
  transition: all 0.3s ease;
}
form .field button:active{
  transform: scale(0.95);
}
form .signup-link{
  color: #262626;
  margin-top: 20px;
  text-align: center;
}
form .pass-link a,
form .signup-link a{
  color: #4158d0;
  text-decoration: none;
}
form .pass-link a:hover,
form .signup-link a:hover{
  text-decoration: underline;
}
    </style>
  </body>
</html>