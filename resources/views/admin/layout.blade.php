<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="/images/Backup_of_logo.png">
    <title>Vision Foreign Language Center</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','Custom Auth Laravel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');
*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
  
}

body {
    background: linear-gradient(0deg, rgba(2,0,36,1) 0%, rgba(75,14,154,1) 35%, rgba(0,212,255,1) 100%);
    height: 100vh;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
}
.login-container,.registration-container {
    background: rgba(255, 255, 255, 1); /* Slightly transparent background */
    padding: 30px;
    border-radius: 50px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
}
.login-container h4, .registration-container h4{
  color: #f7345e;
  background: linear-gradient(-107deg, #82009f 0%, #f7345e 100%);
  transform: skewX(-10deg);
  /* position: relative;
  display: inline-block; */
  font-weight: 700;
  text-transform: capitalize;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
.login-container form, .registration-container form{
    border-radius: 10px;
}

.login-container .btn-primary, .registration-container .btn-primary,
.forget-ps .btn-primary{
    width: 100%;
    border: none;
    border-radius: 10px;
    background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(75,14,154,1) 35%, rgba(0,212,255,1) 100%);
    font-weight: 500;
}

.login-container .btn-facebook, .login-container .btn-google,
.registration-container .btn-facebook, .registration-container .btn-google{
  border-radius: 10px;
  border: 1px solid #ccc;
  color: #000000;
  font-weight: 600;
}

.login-container .btn-facebook, .login-container .btn-google{
  border: 1px solid #ccc;
}

.login-container .form-control,.registration-container .form-control{
    color: rgba(0,0,0,.87);
    box-shadow: none !important;
    border: 1px solid #ccc;
    border-radius: 10px;
    }
.login-container  h4, .registration-container h4{
    font-size: 2rem !important;
    font-weight: 700;
 }  
.login-container .form-label, .registration-container .form-label{
    font-weight: 600 !important;
 }

 .btn.btn-login-with-register {
    text-align: center;
    display: inline-block;
    padding: 5px 20px;
    font-size: 16px;
    color: white;
    border: 1px solid #007bff;
    border-radius: 10px;
    cursor: pointer;
    width: 100%;
}


.btn.btn-login-with-register a{
  text-decoration: none;
  color: #007bff;
  font-weight: 500;
}
.btn.btn-login-with-register:hover {
    border-color: #0056b3;
}
@media(max-width: 1200px) {
    .login-container form, .registration-container form{
        width: 80% !important;
    }
  }

  @media(min-width: 1200px) {
    .login-container form, .registration-container form{
        width: 80% !important;
    }
  }
  #emailHelp{
    cursor: pointer;
  }

  #emailHelp a{
    text-decoration: none;
    color: rgb(36, 36, 36);
  }
  #emailHelp a:hover{
    color: rgb(17, 0, 255);
  }

  #registerLink a{
    text-decoration: none;
}

.forget-ps{
  margin-top: 150px;
}
    </style>
  </head>
  <body>
    @include('header')
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
  <script src="/js/bootstrap.min.js"></script>
  <script src="https://cdn.lordicon.com/lordicon.js"></script>

</html>