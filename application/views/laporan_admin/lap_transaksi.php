<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-9">
                <div class="dropdown">
                    
                        
                    
                    
                        <a class="btn btn-warning " class="dropdown-item" target="_blank" href="<?= base_url('laporan_admin/cetak_laporan_transaksi/ ' . $tgl_awal . '/' . $tgl_akhir); ?>" >
                        <span  class="icon text-black-200">
                            <i class="fa fa-fw fa-print"></i>
                        </span>
                        <span class="text-black-200">Print</span>
                        </a>
                        
                    
                    
                </div>
            </div>
            <div class="col-lg-3">
                <div align="right">
                <li class="breadcrumb-item active">Periode dari <?= date('d/m/Y', strtotime($tgl_awal)); ?> s.d <?= date('d/m/Y', strtotime($tgl_akhir)); ?></li>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>No Invoice</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $no=1;
                foreach ($lap_transaksi as $dp):
                ?>
                    <tr>
                        
                        <td><?= $dp['tanggal']; ?></td>
                        <td><?= $dp['invoice_spp']; ?></td>
                        <td><?= $dp['nis']; ?></td>
                        <td><?= $dp['nama']; ?></td>
                        <td><?= $dp['nama_kelas']; ?></td>
                        <td><?= $dp['grand_total']; ?></td>
                        
                    </tr>
                <?php endforeach; ?>
                </tbody>
                <tfooter>
                        <tr>
                            <th colspan="5">Grand Total transaksi</th>
                            <th>Rp. <?= number_format($grand_total, 0, ',','.'); ?></th>
                        </tr>
                    </tfooter>
            </table>
        </div>
</div>
</div>
