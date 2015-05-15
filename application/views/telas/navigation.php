<!--<div class="container">-->
      
      <!-- Static navbar -->
      <div class="navbar navbar-inverse menu_green" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
            <?php $class = $this->router->fetch_class(); ?>
            
          <div class="navbar-collapse collapse" style="height: 1px;">
            <ul class="nav navbar-nav">
                {menu_list}
                
<!--              <li class="<?=$class=='index'? 'active':''; ?>"><a href="{base_url}index" class="hvr-bounce-to-bottom"><span class="glyphicon glyphicon-home "></span> Home</a></li>
              <li class="<?=$class=='funcionario'? 'active':''; ?>"><a  href="{base_url}funcionario" class="hvr-bounce-to-bottom">Funcionário</a></li>
              <li><a href="" class="hvr-bounce-to-bottom">Outros</a></li>
              <li><a href="" class="hvr-bounce-to-bottom">Outros</a></li>
              <li><a href="" class="hvr-bounce-to-bottom">Outros</a></li>
              <li><a href="" class="hvr-bounce-to-bottom">Outros</a></li>
              <li><a href="" class="hvr-bounce-to-bottom">Outros</a></li>
              <li><a href="" class="hvr-bounce-to-bottom">Outros</a></li>
              <li><a href="" class="hvr-bounce-to-bottom">Outros</a></li>
              <li><a href="" class="hvr-bounce-to-bottom">Outros</a></li>
              <li><a href="" class="hvr-bounce-to-bottom">Outros</a></li>
              <li><a href="" class="hvr-bounce-to-bottom">Outros</a></li>
              <li><a href="" class="hvr-bounce-to-bottom">Outros</a></li>
              <li><a href="" class="hvr-bounce-to-bottom">Outros</a></li>
              <li><a href="" class="hvr-bounce-to-bottom">Outros</a></li>
              <li><a href="" class="hvr-bounce-to-bottom">Outros</a></li>
              <li><a href="" class="hvr-bounce-to-bottom">Outros</a></li>
              <li><a href="" class="hvr-bounce-to-bottom">Outros</a></li>
              <li><a href="" class="hvr-bounce-to-bottom">Outros</a></li>
              <li><a href="" class="hvr-bounce-to-bottom">Outros</a></li>
              <li><a href="" class="hvr-bounce-to-bottom">Outros</a></li>
              -->
              <!--
              <li class="dropdown">
                <a href="#" class="dropdown-toggle hvr-bounce-to-bottom" data-toggle="dropdown">Products<b class="caret"></b></a>
                <ul class="dropdown-menu">
                <li><a href="#">Latest Products</a></li>
                <li><a href="#">Popular Products</a></li>
                </ul>
              </li>          
              <li class="dropdown">
                <a href="#" class="dropdown-toggle hvr-bounce-to-bottom" data-toggle="dropdown">Membership<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Personal Membership</a></li>
                  <li><a href="#">Premium Membership</a></li>
                </ul>
              </li>
              <li><a href="#" class="hvr-bounce-to-bottom">Offers</a></li>
              <li><a href="#" class="hvr-bounce-to-bottom">Gallery</a></li>
              <li><a href="#" class="hvr-bounce-to-bottom">About Us</a></li>
              <li><a href="#" class="hvr-bounce-to-bottom">Contact</a></li>
              <li class="dropdown">
                <a class="dropdown-toggle hvr-bounce-to-bottom" data-toggle="dropdown" href="#">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                </ul>
              </li>
              -->
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>
    <!--</div>  /container -->
    
    <!--<div class="col-md-12 corpo"><span class="hvr-bounce-to-bottom">ds</span></div>-->