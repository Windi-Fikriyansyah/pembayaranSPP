<div class="card card-primary">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data Siswa</h6>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="" method="post">
        <div class="card-body">
            <input type="hidden" name="id" value="<?= $ubah_siswa['id_siswa'] ?>">
            <div class="form-group">
                <label for="exampleInputEmail1">NIS</label>
                <input type="text" name="nis" value="<?= $ubah_siswa['nis'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" name="nama" value="<?= $ubah_siswa['nama'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" value="<?= $ubah_siswa['tanggal_lahir'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">No Telepon</label>
                <input type="text" name="no_tlp" value="<?= $ubah_siswa['no_tlp'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" value="<?= $ubah_siswa['email'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Kelas</label>
                <select class="custom-select" name="kelas">
                    <option value="<?= $ubah_siswa['id_kelas'] ?>"><?= $ubah_siswa['nama_kelas'] ?></option>
                    <?php foreach ($kelas as $kls) : ?>
                        <option value="<?= $kls['id'] ?>"><?= $kls['nama_kelas'] ?></option>
                    <?php endforeach; ?>
                </select>
                <small class="form-text text-danger"><?= form_error('kelas'); ?></small>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Jurusan</label>
                <select class="form-control" name="jurusan">
                    <option value="<?= $ubah_siswa['jurusan'] ?>"><?= $ubah_siswa['jurusan'] ?></option>
                    <option value="IPA">IPA</option>
                    <option value="IPS">IPS</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Angkatan</label>
                <select class="custom-select" name="angkatan">
                    <option value="<?= $ubah_siswa['id_angkatan'] ?>"><?= $ubah_siswa['tahun'] ?></option>
                    <?php foreach ($angkatan as $kls) : ?>
                        <option value="<?= $kls['id_angkatan'] ?>"><?= $kls['tahun'] ?></option>
                    <?php endforeach; ?>
                </select>
                <small class="form-text text-danger"><?= form_error('angkatan'); ?></small>
            </div>

            <div class="form-group">
                 <label for="exampleInputEmail1">Username</label>
                 <input type="text" name="username" value="<?= $ubah_siswa['username'] ?>" class="form-control" required>
             </div>
             <div class="form-group">
                 <label for="exampleInputEmail1">Password</label>
                 <input type="password" name="pass1" class="form-control">
             </div>
             <div class="form-group">
                 <label for="exampleInputEmail1">Konfirmasi Password</label>
                 <input type="password" name="pass2" class="form-control">
             </div>


             <div class="form-group">
                <label for="exampleInputEmail1">Hak Akses</label>
                <input type="text" name="hak_akses" value="<?= $ubah_siswa['hak_akses'] ?>" class="form-control" readonly>
            </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" name="tambah" class="btn btn-primary"><i class="fa fa-check"></i>&nbsp;Update</button>
        </div>
    </form>
</div>
<!-- /.card -->