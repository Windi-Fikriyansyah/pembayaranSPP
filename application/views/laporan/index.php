


<div class="card">
    <div class="card-header">

    </div>
    
    <div class="card-body">
        <div class="table-responsive">
        <a class="btn btn-warning mb-2" class="dropdown-item" target="_blank" href="<?= base_url('laporan/cetak_laporan_siswa'); ?>" >
                        <span  class="icon text-black-200">
                            <i class="fa fa-fw fa-print"></i>
                        </span>
                        <span class="text-black-200">Print</span>
                        </a>
                      
            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Bulan</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Nominal</th>
                        <th>Status</th>
                        
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data_pembayaran as $byr) :
                    ?>
                    
                        <tr>

                            <td><?= $no++ ?></td>

                            <td><?= $byr['tanggal']; ?></td>
                            <td><?= $byr['bulan']; ?></td>
                            <td><?= $byr['nis']; ?></td>
                            <td><?= $byr['nama']; ?></td>
                            <td><?= $byr['nama_kelas']; ?></td>
                            <td><?= $byr['grand_total']; ?></td>
                            <td>
                            <?php if($byr['status'] == 1) {?>
                                        
                                    
                                    <button type="button" name="ubah" class="btn btn-success">Aktif</button>
                                    
                                    <?php }else{?>
                                        
                                    
                                    <button type="button" name="ubah" class="btn btn-danger">Non Aktif</button>
                                   
                                    <?php }?>
                            </td>
                            
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>