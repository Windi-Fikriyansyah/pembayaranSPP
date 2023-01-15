


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 fw-" style="text-align: center; font-weight: 900; ">SELAMAT DATANG DI SISTEM INFORMASI PEMBAYARAN SPP
SMA BOEDI OETOMO PONTIANAK
</h1>
    
</div>
<div class="row ml-1 mr-1 justify-content-center">
<div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Bulan Terakhir Di Bayar</div> 
                            
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $this->fungsi->bulan_teakhir()->bulan ?></div>
                    </div>
                    <div class="col-auto">
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Catatan Pembayaran</div> 
                            
                        <div class="h5 mb-0 font-weight-bold text-gray-800"> Harap Bayar Sebelum Tanggal 10</div>
                        
                    </div>
                    <div class="col-auto">
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Biaya SPP Perbulan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $this->fungsi->siswa_home()->nominal ?></div>
                    </div>
                    <div class="col-auto">
                    </div>
                </div>
            </div>
        </div>
    </div>

     
</div>

</div>

    
