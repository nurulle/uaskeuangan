<div class="block-header">
    <h2>DASHBOARD</h2>
</div>


<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="info-box-3 bg-blue hover-zoom-effect">
            <div class="icon">
                <i class="material-icons">account_balance_wallet</i>
            </div>
            <div class="content">
                <div class="text">SALDO SEKARANG</div>
                <?php
                    $query = $this->db->query("SELECT ROUND ( SUM(IF(status = 'Masuk', jumlah, 0))-(SUM(IF( status = 'Keluar', jumlah, 0))) ) AS subtotal FROM keuangan");

                    foreach ($query->result_array() as $rows) {
                      $dwet = $rows['subtotal'];
                      $arto = number_format($dwet,0,",",".");
                       echo "<div class='number'><b>Rp. $arto</b></div>";
                     } 
                 ?>
                
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="info-box-3 bg-green hover-zoom-effect">
            <div class="icon">
                <i class="material-icons">attach_money</i>
            </div>
            <div class="content">
                <div class="text">PEMASUKAN</div>
                <?php
                    $mlebu = $this->db->query("SELECT status , SUM(jumlah) AS masuk FROM keuangan WHERE status = 'Masuk'")->result_array();
                    foreach ($mlebu as $anu) {
                        $a = $anu['masuk'];
                        $b = number_format($a,0,",",".");
                        echo "<div class='number'><b>Rp. $b</b></div>";
                    }
                ?>
                
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="info-box-3 bg-red hover-zoom-effect">
            <div class="icon">
                <i class="material-icons">attach_money</i>
            </div>
            <div class="content">
                <div class="text">PENGELUARAN</div>
                <?php
                    $metu = $this->db->query("SELECT status , SUM(jumlah) AS keluar FROM keuangan WHERE status = 'keluar'")->result_array();
                    foreach ($metu as $anu1) {
                        $a1 = $anu1['keluar'];
                        $b1 = number_format($a1,0,",",".");
                        echo "<div class='number'><b>Rp. $b1</b></div>";
                    }
                ?>
                
            </div>
        </div>
    </div>
</div>