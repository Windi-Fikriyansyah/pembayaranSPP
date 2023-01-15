<div class="card">
    
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Bulan Dibayar</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Nominal</th>
                        
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data_siswa as $byr) :
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>

                            <td><?= $byr['tanggal']; ?></td>
                            <td><?= $byr['bulan']; ?></td>
                            <td><?= $byr['nis']; ?></td>
                            <td><?= $byr['nama']; ?></td>
                            <td><?= $byr['nama_kelas']; ?></td>
                            <td><?= $byr['grand_total']; ?></td>
                            
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<div class="card card-primary">
    <?php echo $this->session->flashdata('message'); ?>
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Pembayaran Spp</h6>
    </div>
    <div class="card card-widget">
        <div class="card-body">
            <form action="" method="post">

                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">

                        <label for="exampleInputEmail1">Siswa</label>
                            <select class="custom-select" name="siswa">
                            <?php foreach ($siswa as $spl) : ?>
                        <option value="<?= $spl['id_siswa']; ?>"><?= $spl['nis']; ?>-<?= $spl['nama']; ?></option>
                        <?php endforeach; ?>
                        
                    </select>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tgl Pembayaran</label>
                            <input type="date" name="tgl_sewa" id="date1" value="<?= date('Y-m-d') ?>" class="form-control">
                            <small class="form-text text-danger"><?= form_error('tgl_sewa'); ?></small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                          
                        
                        
                        
                    <label for="exampleInputEmail1">Bulan</label>
                    <select class="custom-select" name="bulan">
                        <option selected>--Pilih Bulan--</option>
                        <option value="Januari">Januari</option>
                        <option value="Februari">Februari</option>
                        <option value="Maret">Maret</option>
                        <option value="April">April</option>
                        <option value="Mei">Mei</option>
                        <option value="Juni">Juni</option>
                        <option value="Juli">Juli</option>
                        <option value="Agustus">Agustus</option>
                        <option value="September">September</option>
                        <option value="Oktober">Oktober</option>
                        <option value="November">November</option>
                        <option value="Desember">Desember</option>
                    </select>
                
                        </div>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tahun</label>
                            <input type="text" name="tahun" id="id_tahun" class="form-control" readonly>
                        </div>
                    </div>
                </div> -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nominal</label>
                            <input type="text" name="nominal" id="id_nominal" class="form-control" value="<?= $spl['nominal']; ?>" readonly>
                        </div>
                    </div>
                </div>


                
                <!-- <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            
                            <label for="exampleInputEmail1">Total Bayar</label>
                            <input type="number" name="bayar" class="form-control" value="0" min="0" required>
                            <small class="form-text text-danger"><?= form_error('bayar'); ?></small>
                        </div>
                    </div>
                </div> -->

        </div>
        <div class="card-footer">
            <button type="submit" name="tambah" class="btn btn-primary"><i class="fa fa-check"></i>&nbsp;Simpan</button>
               </div>
        </form>
    </div>
</div>