<nav class="navbar navbar-expand-md navbar-light">
    <div class="container">
      <a class="navbar-brand" href="?mainpage=dashboardhome">Dashboard</a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
       </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
          <a class="nav-link mx-2" href="?mainpage=dashboardhome">Home</a>
          </li>
          <li class="nav-item">    
          <a class="nav-link mx-2" href="controller/c_users.php?page=">Users</a>   <!-- this page return to user page after update session (new data) -->                     
          </li>
          <li class="nav-item mx-2">
          <a class="nav-link" href="controller/c_categoriescrud.php?page=">Categories</a>
          </li>
          <li class="nav-item active">
          <a class="nav-link mx-2" href="controller/c_advertismentscrud.php?page=">Advertisments</a>
          </li>
          <a class="nav-link mx-2" href="controller/c_commentscrud.php?page="">Comments</a>
          </li>
          <!-- <li class="nav-item dropdown mx-2">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Php</a>
              <a class="dropdown-item" href="#">laravel</a>
              <a class="dropdown-item" href="#">java</a>
            </div>
          </li> -->
        </ul>
        </div>
      </div>
  </nav>