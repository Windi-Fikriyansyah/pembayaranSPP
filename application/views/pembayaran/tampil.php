

<div class="card">
    <div class="card-header">

        <div class="card shadow mb-4">
            <div class="card-header py-2">
                <div class="my-2"></div>
            
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama Siswa</th>
                                
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>Angkatan</th>
                                
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
                                    
                                    <td><?= $cs['nama_kelas']; ?></td>
                                    <td><?= $cs['jurusan']; ?></td>
                                    <td><?= $cs['tahun']; ?></td>
                                    <td>
                                        <a href="<?= base_url() ?>pembayaran_spp/pembayaran/<?= $cs['id_siswa']; ?>" class="btn-small text-info"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
</svg> Lihat Data</a>
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