<div class="card">
    <div class="card-header">

        <div class="card shadow mb-4">
            <div class="card-header py-2">
                <div class="my-2"></div>
                <?php echo $this->session->flashdata('message'); ?>
                <a href="<?= base_url('data_siswa/tambah'); ?>" class="btn btn-w-m btn-primary">Tambah</a>


            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama Siswa</th>
                                <th>Tanggal Lahir</th>
                                <th>No Telepon</th>
                                <th>Email</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>Angkatan</th>
                                <th>Status</th>
                                
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <!-- /.card-header -->



                            <?php
                            $no = 1;
                            foreach ($data_siswa as $cs) :
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $cs['nis']; ?></td>
                                    <td><?= $cs['nama']; ?></td>
                                    <td><?= $cs['tanggal_lahir']; ?></td>
                                    <td><?= $cs['no_tlp']; ?></td>
                                    <td><?= $cs['email']; ?></td>
                                    <td><?= $cs['nama_kelas']; ?></td>
                                    <td><?= $cs['jurusan']; ?></td>
                                    <td><?= $cs['tahun']; ?></td>
                                    

                                    <td>
                                
                                    <?php if($cs['status'] == 1) {?>
                                        <form action="<?= base_url('data_siswa/ubah_status'); ?>" method="post">
                                <input type="hidden" name="id" value="<?= $cs['id_siswa'] ?>">
                                    <input type="hidden" name="status" value="0">
                                    <button type="submit" name="ubah" class="btn btn-success">Aktif</button>
                                    </form>
                                    <?php }else{?>
                                        <form action="<?= base_url('data_siswa/ubah_status'); ?>" method="post">
                                <input type="hidden" name="id" value="<?= $cs['id_siswa'] ?>">
                                    <input type="hidden" name="status" value="1">
                                    <button type="submit" name="ubah" class="btn btn-danger">Non Aktif</button>
                                    </form>
                                    <?php }?>
                                    
                                
                        
                            
                        
                                    </td>
                                    


                                    <td>
                                        <a href="<?= base_url() ?>data_siswa/ubah/<?= $cs['id_siswa']; ?>" class="btn-small text-info"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="#modal-hapus<?= $cs['id_siswa']; ?>" data-toggle="modal" class="btn-small text-danger"><i class="fas fa-trash"></i>Hapus</a>
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



    <?php foreach ($data_siswa as $cs) : ?>
        <div class="modal fade" id="modal-hapus<?= $cs['id_siswa']; ?>" aria-modal="true" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form method="post" action="<?= base_url('data_siswa/hapus'); ?>">
                        <div class="modal-body">
                            <p>Apakah Anda Yakin Ingin Hapus ?</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <input type="hidden" name="id" value="<?= $cs['id_siswa']; ?>">
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