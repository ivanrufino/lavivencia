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
    </head>
    <body>
        <div class="container">
            <div class="nav nav-header navbar-collapse" style="height: 60px; background: beige">
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
