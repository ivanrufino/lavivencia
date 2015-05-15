<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>La Vivencia</title>
        {css_list}
        {js_list}
        <script>
            $(document).ready(function(){
                var localAtual = '.view_' +'<?= $this->router->fetch_class(); ?>';
                $('li[class^=view_]').removeClass('active');
                $(localAtual).addClass('active');
                console.log(localAtual)
            })
        </script>
    </head>
    <body>
        <div class="container">
            <div class="nav nav-header navbar-collapse" style="height: 60px; background: beige">
                <ul class="nav navbar-nav navbar-right">
                                    <li class="dropdown"><a href="#" class="dropdown-toggle hvr-sweep-to-bottom" data-toggle="dropdown">Minha Conta
                                        <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="navbar-content">
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <img src="http://placehold.it/120x120"
                                                                alt="Alternate Text" class="img-responsive" />
                                                            <p class="text-center small">
                                                                <a href="#">Alterar Foto</a></p>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <span>Ivan Rufino Martins</span>
                                                            <p class="text-muted small">
                                                                ivan.rufino.m@gmail.com</p>
                                                            <div class="divider">
                                                            </div>
                                                            <a href="#" class="btn btn-primary btn-sm active">Prefências</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="navbar-footer">
                                                    <div class="navbar-footer-content">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <a href="#" class="btn btn-default btn-sm">Mudar foto</a>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <a href="{base_url}sair" class="btn btn-default btn-sm pull-right">Sair do Sistema</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                  
                                </ul>
                <?php echo "<h2>". $this->session->flashdata('msg')."</h2>" ;              ?>
            </div>   
            
        {view_menu}
        {view_index}
        <div class='clearfix'><br></div>
        <div class="footer col-sm-12">Desenvolvido por Ivan Rufino</div>
        </div>
        '
    </body>
</html>
