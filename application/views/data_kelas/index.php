<div class="card">
    <div class="card-header">

        <div class="card shadow mb-4">
            <div class="card-header py-2">
                <div class="my-2"></div>
                <?php echo $this->session->flashdata('message'); ?>
                <a href="" data-toggle="modal" data-target="#modal-kelas" class="btn btn-primary mt-1">Tambah Data</a>
                
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <!-- /.card-header -->



                            <?php
                            $no = 1;
                            foreach ($data_kelas as $cs) :
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $cs['nama_kelas']; ?></td>

                                    <td>
                                        <a href="<?= base_url() ?>data_kelas/ubah/<?= $cs['id']; ?>" class="btn-small text-info"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="#modal-hapus<?= $cs['id']; ?>" data-toggle="modal" class="btn-small text-danger"><i class="fas fa-trash"></i>Hapus</a>
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
    <div class="modal fade" id="modal-kelas" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <div class="modal-header">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Kelas</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="ibox-content">
                        <?= form_open_multipart('data_kelas/tambah'); ?>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Kelas</label>
                            <input type="text" name="nama_kelas" class="form-control" required>
                        </div>


                        <button class="btn btn-primary " type="submit" name="tambah"><i class="fa fa-check"></i>&nbsp;Simpan</button>
                    </div>
                    <!-- /.card-body -->
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>


    <?php foreach ($data_kelas as $cs) : ?>
        <div class="modal fade" id="modal-hapus<?= $cs['id']; ?>" aria-modal="true" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form method="post" action="<?= base_url('data_kelas/hapus'); ?>">
                        <div class="modal-body">
                            <p>Apakah Anda Yakin Ingin Hapus ?</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <input type="hidden" name="id" value="<?= $cs['id']; ?>">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-primary">Yes</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>





<?php endforeach; ?>
</div>
</div>