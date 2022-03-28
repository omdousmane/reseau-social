 <?php $currentUser = $currentUser ?? false; ?>
 <header class="header">
   <nav class="header-desktop">
     <a href="/index.php" class="logo">
       <span>Straight Talk</span>
     </a>
     <?php if ($_SERVER['REQUEST_URI'] === '/views/profile.php') : ?>
     <a href="#">
       <img src="/public/img/icons/Frame 23.svg" title="Home" class="mxy-40" alt="user">
     </a>
     <?php endif ?>
     <form class="header-desktop__form form-search ml-20" method="POST" autocomplete="off">
       <div class="search autocomplete">
         <img src="/public/img/icons/bytesize_search.svg" class="icon-searh" alt="searh">
         <input type="search" name="search" id="myInput" class="form-control" name="myCountry"
           placeholder="search..." />
       </div>
     </form>

     <?php if ($_SERVER['REQUEST_URI'] === '/views/profile.php') : ?>
     <a href="#" class="dropdown">
       <img src="/public/img/icons/bi_arrow-up-right-circle.svg" class="mxy-40">
     </a>

     <button class="message-show" title="Message">
       <img src="/public/img/icons/eva_message-circle-fill.svg" class="mxy-40" alt="user">
     </button>
     <a href="#">
       <img src="/public/img/icons/akar-icons_plus.svg" title="Crée un Post" class="mxy-40" alt="user">
     </a>
     <a class="btn btn-primary mr-20" href="/views/logout.php" title="Déconexion" role="button">Déconexion
     </a>
     <?php else : ?>

     <div class="header-desktop__content-right">
       <?php if ($_SERVER['REQUEST_URI'] === '/views/login.php') : ?>
       <a class="btn btn-primary ml-20 mr-20" role="button" title="Inscription"
         href="/views/register.php">Inscription</a>
       <?php elseif ($_SERVER['REQUEST_URI'] === '/views/register.php') : ?>
       <a class="btn btn-primary ml-20 mr-20" role="button" title="Connexion" href="/views/login.php">Connexion</a>
       <?php else : ?>
       <a class="btn btn-primary ml-20 mr-20" role="button" title="Inscription"
         href="/views/register.php">Inscription</a>
       <a class="btn btn-primary ml-20 mr-20" role="button" title="Connexion" href="/views/login.php">Connexion</a>
       <?php endif ?>
       <?php endif ?>

       <!-- menu deroulant -->
       <div class="dropdown">
         <img src="/public/img/icons/userA.svg" onclick="myFunction()" class="dropbtn" alt="user">
         <div id="myDropdown" class="dropdown-content">
           <a href="#" id="mode">
             <i class="fas fa-moon"></i>
             <span class="theme">Thème sombre</span>
           </a>
           <a href="/views/profile.php">Profil</a>
           <a href="#about">Connexion</a>
           <a href="#contact">Inscription</a>
           <a href="#home">Home</a>
         </div>
       </div>
     </div>
   </nav>

   <div class="header-mobile">
     <a href="#">
       <div class="logo">Straight Talk</div>
     </a>
     <form class="" method="POST">
       <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
     </form>

     <a id="link" href="#"><span id="burger"></span></a>
     <ul class="list-unstyled">
       <li><a href="#">Accueil</a></li>
       <li><a href="#">Formation</a></li>
       <li><a href="#">Contact</a></li>
       <li> <a class="btn btn-primary mr-20 ms-mobile" href="/views/logout.php" role="button">Déconexion
         </a></li>
     </ul>
   </div>
 </header>