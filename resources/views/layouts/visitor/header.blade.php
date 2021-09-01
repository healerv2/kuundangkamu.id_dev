<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard | User</title>

  <!-- Google Font: Poppins -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('')}}/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{url('')}}/assets/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="{{url('')}}/css/user.min.css">
</head>
<body class="">
  
  <header class="nav">
    <div class="nav__left">
      <div class="hamburger">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="nav__right">
      <a href="#" class="logo">
        <img src="" alt="">
      </a>
    </div>
  </header> 
  <header> 
    <div class="header wow fadeInDown" data-wow-delay="1s">
        <div class="container">
            <div class="header__col">
                <div class="header__col_left">
                    <div class="header__col_left_left">
                        <h1 class="header__logo"><a href="/"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png" alt="logo" width="150" height="38"></a></h1>
                    </div>
                    <div class="header__col_left_right hide-lg">
                        <button type="button" aria-label="hamburger" class="hamburger" data-toggle-open="menu">
                            <div class="hamburger-box">
                                <div class="hamburger-box-inner"></div>
                            </div>
                        </button>
                    </div>
                </div>
                <div class="header__col_right">
                    <div class="header__nav" data-toggle="menu">
                        <div class="header__nav_inner">
                            <ul class="header__nav_inner_list -unstyled -flex -justify-between">
                              <li class="active">
                                <a href="#">
                                  <i class="fas fa-home"></i>
                                  <span>Dashboard</span>
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <i class="fas fa-list"></i>
                                  <span>List Template</span>
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <i class="fas fa-envelope"></i>
                                  <span>Undanganku</span>
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <i class="fas fa-paper-plane"></i>
                                  <span>Kirim Undangan</span>
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <i class="fas fa-user-cog"></i>
                                  <span>Profil</span>
                                </a>
                              </li>
                              <li>
                                <a href="{{url('logout')}}">
                                  <i class="nav-icon fas fa-sign-out-alt"></i>
                                  <span>log out</span>
                                </a>
                              </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </header>
  <div class="main">
