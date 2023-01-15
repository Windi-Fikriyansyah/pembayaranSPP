<!-- general form elements -->
<div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Halaman Tambah Data</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form  method="post" action="">
                <div class="card-body">
                <div class="form-group">
                    <label>Nama Pengguna</label>
                    <input type="text" placeholder="Nama Pengguna" name="nama_petugas" value="<?= set_value('nama_petugas'); ?>" class="form-control <?= form_error('nama_petugas') ? 'is-invalid' : null ?>" >
                    <small class="form-text text-danger"><?= form_error('nama_petugas'); ?></small>
                    </div>

                    <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>" class="form-control <?= form_error('email') ? 'is-invalid' : null ?>" >
                    <small class="form-text text-danger"><?= form_error('email'); ?></small>
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
                    <label for="exampleInputEmail1">Konfirmasi Password</label>
                    <input type="password" name="pass2" placeholder="Konfirmasi Password" value="<?= set_value('pass2'); ?>" class="form-control <?= form_error('pass2') ? 'is-invalid' : null ?>">
                    <small class="form-text text-danger"><?= form_error('pass2'); ?></small>
                    </div>
                    
                <div class="form-group">
                    <label for="email">Hak Akses</label>
                    <select name="hak_akses" class="form-control <?= form_error('hak_akses') ? 'is-invalid' : null ?>"></small>
                        <option value="">--PILIH--</option>
                        <option value="Kepala Sekolah">Kepala Sekolah</option>
                        <option value="Admin">Admin</option>
                        
                    </select>
                    <small class="form-text text-danger"><?= form_error('hak_akses'); ?></small>
                    </div>
                    </div>

                <!-- /.card-body -->
                <div class="card-footer">
                <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
                </div>
                </div>
                
        </form>
        </div>
        
            <!-- /.card -->