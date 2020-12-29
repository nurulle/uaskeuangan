<!-- Menu -->
<div class="menu">
    <ul class="list">
        <li class="header">MENU</li>
        <li class="active">
            <a href="<?php echo base_url() ?>administrator/home">
                <i class="material-icons">home</i>
                <span>Home</span>
            </a>
        </li>
        <?php
            echo "<li>
                <a href='".base_url().$this->uri->segment(1)."/identitaswebsite'>
                    <i class='material-icons'>person</i>
                    <span>Profil</span>
                    </a>
            </li>";
            
        ?>

    <?php   
            echo "<li>
                <a href='".base_url().$this->uri->segment(1)."/manajemenkeuangan'>
                    <i class='material-icons'>calculate</i>
                    <span>Keuangan</span>
                    </a>
            </li>";
            
        ?>
       
     
       
    </ul>
</div>
<!-- #Menu -->
<!-- Footer -->
<div class="legal">
    <div class="copyright">
        <strong>&copy; <?php echo date('Y'); ?> choco.</strong> 
    </div>
    