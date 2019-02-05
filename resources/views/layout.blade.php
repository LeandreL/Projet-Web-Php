<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Site du BDE </title>
        <meta charset = 'utf8'>
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap.min.css')}}" rel ="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">


    </head>
    <body id="mode">
        <header>
            <div class="container">
              <h1 class="logo">    
                <a style="text-decoration:none" href="/"> <img src="{{asset('/storage/logo.png')}}" alt="Brand" height="60" width="160" href="/"> </a>
                 <input  class="favorite styled" type="button" value="Mode nuit"> 
                </h1>

              <nav>
                <ul>      
           <?php if (auth()->check())
                     { 
                     $user = Auth::user();  echo "<span class='blanc'> Bonjour ".$user->username;
                        if ($user->avatarurl !== "0")
                        {
                        echo "<img src=/storage/".$user->avatarurl." height='50' width='50'></span>"; 
                        }
                      } ?>
                      
                    <li><a href="/ProductList">Boutique </a></li>
                    <li><a href="/EventList">Évènement </a></li>
                    
                       <?php    
                          if (auth()->check())
                          {
                             $user = Auth::user(); 
                             $oui = $user->role;
                             if ( 3 == $oui )
                                { 
                                  echo  '<li><a href="/addproduct">Ajouter un nouvel article</a></li>';  
                                  echo '<li><a href="/addevent">Ajouter un nouvel évènement</a></li>'; 
                                } 
                            
                            echo '<li><a href="/moncompte">Mon compte</a></li>';
                            echo '<li><a href="/showcart"><i class="fas fa-shopping-cart"></i></a></li>';

                          } 
                        else 
                        {
                          echo '<li><a href="/adduser">Inscription/connection</a></li>';
                        }
                        ?> 
                            
                </ul>
              </nav>
            </div>
        </header>
<div style="min-height: 738px">
      
@include('flash::message')
@yield('contenu')

</div>

<footer class="page-footer font-small blue pt-3" style="background-color: #00264d">
      <div class="container fluid text-center text-md-left">
        <div class="row">
          <hr class="clearfix w-100 d-md-none pb-3">

              <div class="col-lg 3 col-md-4 col-ls-12">
                <a class="text-uppercase center" href="/mentionslegales"> Mentions légales </a>
              </div>

              <div class="col-lg-3 col-md-4 col-ls-12">
                <a class="text-uppercase center" href="/contact"> Nous contacter </a>
              </div>

              <div class="col-lg-3 col-md-4 col-ls-12">
                <a class="text-uppercase center" href="/cgv"> Conditions générales de ventes </a>
              </div>
      
         </div>
        <div class="footer-copyright text-center py-3 blanc">© 2019 CESI</div>
      </footer>    
    </body>
  <script src="js/Mode nuit.js"></script>
</html>
