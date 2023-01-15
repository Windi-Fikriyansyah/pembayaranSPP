<div class="card">
    <div class="card-header">

    <div class="card shadow mb-4">
                        <div class="card-header py-2">
                        <div class="my-2"></div>
                        <?php echo $this->session->flashdata('message'); ?>
    <a href="" data-toggle="modal" data-target="#modal-angkatan" class="btn btn-primary mt-1">Tambah Data</a>
                                    
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                    <th>No</th>
                    <th>Tahun Angkatan</th>
                    <th>Nominal</th>
                    <th>Aksi</th>
                </tr>
                                    </thead>
                                    
                                    <tbody>
            <!-- /.card-header -->
            
            
        
        <?php
            $no=1;
            foreach($data_angkatan as $cs):
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $cs['tahun']; ?></td>
                    <td>Rp. <?= $cs['nominal']; ?></td>
                    
                    <td>
                        <a href="<?= base_url()?>data_angkatan/ubah/<?= $cs['id_angkatan']; ?>" class="btn-small text-info"><i class="fas fa-edit"></i> Edit</a>
                        <a href="#modal-hapus<?= $cs['id_angkatan']; ?>" data-toggle="modal" class="btn-small text-danger"><i class="fas fa-trash"></i>Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                                </table>
                            </div>
                            </div>
                            </div>
                            </div>
                        


<!-- Modal -->
<div class="modal fade" id="modal-angkatan" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Angkatan</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="ibox-content">
                    <?= form_open_multipart('data_angkatan/tambah'); ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tahun Angkatan</label>
                        <input type="text" name="tahun" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nominal</label>
                        <input type="text" name="nominal" class="form-control" required>
                    </div>
                    

                    <button class="btn btn-primary " type="submit" name="tambah"><i class="fa fa-check"></i>&nbsp;Simpan</button>
                </div>
                <!-- /.card-body -->
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
  
            
<?php foreach($data_angkatan as $cs): ?>
<div class="modal fade" id="modal-hapus<?= $cs['id_angkatan']; ?>" aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('data_angkatan/hapus'); ?>">
            <div class="modal-body">
                <p>Apakah Anda Yakin Ingin Hapus ?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <input type="hidden" name="id" value="<?= $cs['id_angkatan']; ?>">
                <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Yes</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>

</div>
</div>

<?php endforeach; ?>