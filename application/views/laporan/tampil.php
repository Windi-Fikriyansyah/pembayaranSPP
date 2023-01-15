<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_content">
                <form action="<?= base_url('laporan/laporan_kelas'); ?>" method="POST" class="form-label-left input_mask">
                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <select name="pilih" class="form-control">
                            <option value="">Pilih</option>
                            <?php foreach($kelas as $kls): ?>
                            <option value="<?= $kls['id'] ?>"><?= $kls['nama_kelas'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <button type="submit" class=" btn btn-primary">Cetak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>