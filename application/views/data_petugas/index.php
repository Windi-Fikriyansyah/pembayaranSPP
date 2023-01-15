<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">TABLE DATA ADMIN</h1> -->
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
    <div class="card-header py-2">
                <div class="my-2"></div>
                <?php echo $this->session->flashdata('message'); ?>
                <a href="<?= base_url('data_petugas/tambah'); ?>" class="btn btn-w-m btn-primary">
                                        <span class="icon text-white-4">
                                            
                                        </span>
                                        <span class="text">Tambah</span>
                                    </a>
            </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 5px;">No</th>
                            <th>Nama Pengguna</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Akses</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        $no = 1;
                        foreach ($petugas as $dt) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $dt['nama_petugas']; ?></td>
                                <td><?= $dt['email']; ?></td>
                                <td><?= $dt['username']; ?></td>
                                <td><?= $dt['hak_akses'];?></td>
                                <td>
                                    <a href="<?= base_url() ?>data_petugas/ubah/<?= $dt['id_petugas']; ?>" class="btn-small text-info" admin="button"><i class="fas fa-edit"></i> Edit</a>
                                    
                                        <a href="<?= base_url() ?>data_petugas/hapus/<?= $dt['id_petugas']; ?>" onclick="return confirm('Yakin Data Akan dihapus..?');" admin="button" class="btn-small text-danger" ><i class="fas fa-trash"></i>Hapus</a>
                                    
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

