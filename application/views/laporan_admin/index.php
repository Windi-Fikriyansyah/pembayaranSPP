<div class="col-lg-4">
    <div class="card card-widget">
        <div class="card-body">
            <form action="<?=base_url('laporan_admin/lap_transaksi');?>" method="POST">
                <div class="form-group">
                    <label for="tgl_mulai">Mulai</label>
                        <input class="form-control" type="date" name="tgl_mulai" id="tgl_mulai" value="<?php $bulan = mktime(0,0,0, date('m')-1, date('d'), date('Y')); echo date('Y-m-d', $bulan);?>" prequired="">
                </div>
                <div class="form-group">
                    <label for="tgl_ambil">Akhir</label>
                        <input class="form-control" type="date" name="tgl_ambil" id="tgl_ambil" value="<?=date('Y-m-d');?>" required="">
                </div>
                <button type="submit" class="btn btn-primary">Lihat Laporan</button>
            </form>
        </div>
    </div>
</div>
</div>  