<html>
    <head>
        <meta charset="utf-8">
        <link href="<?=  base_url()?>assets/css/bootstrap.css" rel="stylesheet">
        <link href="<?=  base_url()?>assets/css/login.css" rel="stylesheet">
        <script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>
        
        <script src="<?=  base_url()?>assets/js/jquery-1.10.2.js"></script>
        <script src="<?=  base_url()?>assets/js/login.js"></script>
    </head>
        <?php $this->session->sess_destroy(); ?>
        
        <body>
            <div class="container">
                <div class="row vertical-offset-100">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">                                
                                <div class="row-fluid user-row">
                                    <img src="<?=  base_url()?>assets/imagens/logo_sm_2_mr_1.png" class="img-responsive" alt="Conxole Admin"/>
                                </div>
                            </div>
                           
                            <div class="panel-body">
                                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                                 <?php
                                 if($erros!=""){
                                     echo "<div class='alert alert-danger'><strong>Erros:</strong><br> $erros</div>";
                                 }
                                 ?>
                                 <form accept-charset="UTF-8" role="form" class="form-signin" method="POST" action="acessar">
                                    <fieldset>
                                        <label class="panel-login">
                                            <div class="login_result"></div>
                                        </label>
                                        <input class="form-control" placeholder="Login" id="username" name="login" value="<?php echo set_value('login'); ?>" type="text">
                                        <input class="form-control" placeholder="Senha" id="password" name="senha" type="password">
                                        <br></br>
                                        <input class="btn btn-lg btn-success btn-block" type="submit" id="login" value="Entrar »">
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>
</html>
            