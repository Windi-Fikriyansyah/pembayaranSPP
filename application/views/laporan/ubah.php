<div class="card card-primary">
     <div class="card-header">
         <h6 class="m-0 font-weight-bold text-primary">Edit Data Petugas</h6>
     </div>
     <!-- /.card-header -->
     <!-- form start -->
     <form action="" method="post">
         <div class="card-body">
             <input type="hidden" name="id" value="<?= $ubah_siswa['id_siswa'] ?>">
             
             <div class="form-group">
                 <label for="exampleInputEmail1">Nis</label>
                 <input type="text" name="nis" value="<?= $ubah_siswa['nis'] ?>" class="form-control" readonly>
             </div>
             <div class="form-group">
                 <label for="exampleInputEmail1">Nama Lengkap</label>
                 <input type="text" name="nama" value="<?= $ubah_siswa['nama'] ?>" class="form-control" readonly>
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
             
                <input type="hidden" name="hak_akses" value="<?= $ubah_siswa['hak_akses'] ?>">
             
             <!-- <div class="form-group">
                 <label for="exampleInputEmail1">Hak Akses</label>
                 <select name="hak_akses" class="form-control">
                     <option value="<?= $ubah_siswa['hak_akses'] ?>"><?= $ubah_siswa['hak_akses']?></option>
                     <option value="Kepala sekolah">Kepala sekolah</option>
                     <option value="Admin">Admin</option>
                     <option value="Siswa">Siswa</option>
                 </select>
             </div> -->
            
         </div>
         <!-- /.card-body -->
         <div class="card-footer">
             <button type="submit" name="tambah" class="btn btn-primary"><i class="fa fa-check"></i>&nbsp;Update</button>
         </div>
     </form>
 </div>
 <!-- /.card -->