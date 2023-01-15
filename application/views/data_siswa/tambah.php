<div class="card card-secondary">
            <div class="card-header">
                <h5 class="card-title">Halaman Tambah Data</h5>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">
                <?= form_open_multipart('data_siswa/tambah'); ?>

                <div class="form-group">
                    <label>NIS</label>
                    <input type="text" name="nis" value="<?= set_value('nis'); ?>" class="form-control <?= form_error('nis') ? 'is-invalid' : null ?>" placeholder="NIS">
                    <small class="form-text text-danger"><?= form_error('nis'); ?></small>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Lengkap</label>
                    <input type="text" name="nama" value="<?= set_value('nama'); ?>" placeholder="Nama Siswa" class="form-control <?= form_error('nama') ? 'is-invalid' : null ?>">
                    <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                </div>


                <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" value="<?= set_value('tanggal_lahir'); ?>" class="form-control <?= form_error('tanggal_lahir') ? 'is-invalid' : null ?>">
                    <small class="form-text text-danger"><?= form_error('tanggal_lahir'); ?></small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">No telepon</label>
                    <input type="text" name="no_tlp" placeholder="No Telepon" value="<?= set_value('no_tlp'); ?>" class="form-control <?= form_error('no_tlp') ? 'is-invalid' : null ?>">
                    <small class="form-text text-danger"><?= form_error('no_tlp'); ?></small>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>" class="form-control <?= form_error('email') ? 'is-invalid' : null ?>">
                    <small class="form-text text-danger"><?= form_error('email'); ?></small>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Kelas</label>
                    <select class="custom-select" name="kelas">
                        <option selected>--Pilih Kelas--</option>
                        <?php foreach ($kelas as $kls) : ?>
                            <option value="<?= $kls['id'] ?>"><?= $kls['nama_kelas'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <small class="form-text text-danger"><?= form_error('kelas'); ?></small>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Jurusan</label>
                    <select class="custom-select" name="jurusan">
                        <option selected>--Pilih Jurusan--</option>
                        <option value="IPA">IPA</option>
                        <option value="IPS">IPS</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Angkatan</label>
                    <select class="custom-select select2" name="angkatan">
                        <option selected>--Pilih Angkatan--</option>
                        <?php foreach ($angkatan as $kls) : ?>
                            <option value="<?= $kls['id_angkatan'] ?>"><?= $kls['tahun'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <small class="form-text text-danger"><?= form_error('kelas'); ?></small>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" name="username" placeholder="Username" value="<?= set_value('username'); ?>" class="form-control <?= form_error('username') ? 'is-invalid' : null ?>">
                    <small class="form-text text-danger"><?= form_error('username'); ?></small>
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" name="pass1" placeholder="Password" value="<?= set_value('pass1'); ?>" class="form-control <?= form_error('pass1') ? 'is-invalid' : null ?>">
                    <small class="form-text text-danger"><?= form_error('pass1'); ?></small>
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Konfirmasi Password*</label>
                    <input type="password" name="pass2" placeholder="Konfirmasi Password" value="<?= set_value('pass2'); ?>" class="form-control <?= form_error('pass2') ? 'is-invalid' : null ?>">
                    <small class="form-text text-danger"><?= form_error('pass2'); ?></small>
                    </div>

                    <div class="form-group">
                    <label for="email">Hak Akses</label>
                    <input type="text" value="Siswa" name="hak_akses" value="<?= set_value('hak_akses'); ?>" class="form-control <?= form_error('hak_akses') ? 'is-invalid' : null ?>" readonly>
                    <small class="form-text text-danger"><?= form_error('hak_akses'); ?></small>
                    </div>
                    
                <button class="btn btn-primary" type="submit" name="tambah">&nbsp;Simpan</button>
            </div>
            <!-- /.card-body -->


            <?= form_close(); ?>
        </div>
<!-- /.card -->