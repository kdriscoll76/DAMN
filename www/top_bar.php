<nav class='nav navbar-inverse'>
  <div class='container'>
    <div class='navbar-header'>
    <button  type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
    <span class='icon-bar'></span>
    <span class='icon-bar'></span>
    <span class='icon-bar'></span>
    </button>
    <div class='navbar-brand'>
      DAMN -> <?php echo $page;?>
    </div>
    </div>
    <div class='collapse navbar-collapse' id='myNavbar'>
      <ul class='nav navbar-nav'>
       <li><a class='active' href='main.php'>Home</a></li>
       <li><a href='create.php'>Create</a></li>
       <li><a href='/api/info.html'>API</a></li>
      </ul>
    </div>
    <div style='padding:8px;' class="dropdown">
     <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
       <i class='glyphicon glyphicon-user'><?php echo $email;?></i>
     <span class="caret"></span></button>
      <ul class="dropdown-menu">
       <li><a href="accinfo.php">account</a></li>
       <li><a href="logout.php">logout</a></li>
      </ul>
    </div>
  </div>
</nav>
