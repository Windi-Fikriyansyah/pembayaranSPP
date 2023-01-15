<div class="card">
    <div class="card-header">

    </div>
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
                        <th>Aksi</th>
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
                            
                            <a href="#modal-hapus<?= $byr['invoice_spp']; ?>" data-toggle="modal" class="btn-small text-danger"><i class="fas fa-trash"></i>Hapus</a>
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
<?php foreach ($data_pembayaran as $byr) : ?>
    <div class="modal fade" id="modal-hapus<?= $byr['invoice_spp']; ?>" aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url('pembayaran_spp/hapus'); ?>">
                    <div class="modal-body">
                        <p>Apakah Anda Yakin Ingin Hapus ?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <input type="hidden" name="id" value="<?= $byr['invoice_spp']; ?>">
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