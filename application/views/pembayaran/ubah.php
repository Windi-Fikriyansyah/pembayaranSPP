<div class="card card-primary">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data Pembayaran</h6>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="" method="post">
        <div class="card-body">
            <input type="hidden" name="id" value="<?= $ubah_pembayaran['invoice_spp'] ?>">
            
            <div class="form-group">
                <label for="exampleInputEmail1">Bulan</label>
                <select class="form-control" name="bulan">
                    <option value="<?= $ubah_pembayaran['bulan'] ?>"><?= $ubah_pembayaran['bulan'] ?></option>
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
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" name="tambah" class="btn btn-primary"><i class="fa fa-check"></i>&nbsp;Update</button>
        </div>
    </form>
</div>
</div>
<!-- /.card -->