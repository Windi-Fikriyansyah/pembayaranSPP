<div class="card card-primary">
     <div class="card-header">
         <h6 class="m-0 font-weight-bold text-primary">Edit Data Petugas</h6>
     </div>
     <!-- /.card-header -->
     <!-- form start -->
     <form action="" method="post">
         <div class="card-body">
             <input type="hidden" name="id" value="<?= $ubah_petugas['id_petugas'] ?>">
             <div class="form-group">
                 <label for="exampleInputEmail1">Nama Pengguna</label>
                 <input type="text" name="nama_petugas" value="<?= $ubah_petugas['nama_petugas'] ?>" class="form-control"  required>
             </div>

             <div class="form-group">
                 <label for="exampleInputEmail1">Email</label>
                 <input type="email" name="email" value="<?= $ubah_petugas['email'] ?>" class="form-control"  required>
             </div>
             
             <div class="form-group">
                 <label for="exampleInputEmail1">Username</label>
                 <input type="text" name="username" value="<?= $ubah_petugas['username'] ?>" class="form-control"  required>
             </div>
             <div class="form-group">
                 <label for="exampleInputEmail1">Password</label>
                 <input type="password" name="pass1" class="form-control" >
             </div>
             <div class="form-group">
                 <label for="exampleInputEmail1">Konfirmasi Password</label>
                 <input type="password" name="pass2" class="form-control" >
             </div>
             <?php if($ubah_petugas['hak_akses'] == 'Siswa'){ ?>
                <input type="hidden" name="hak_akses" value="<?= $ubah_petugas['hak_akses'] ?>">
             <?php } else { ?>
             <div class="form-group">
                 <label for="exampleInputEmail1">Hak Akses</label>
                 <select name="hak_akses" class="form-control">
                     <option value="<?= $ubah_petugas['hak_akses'] ?>"><?= $ubah_petugas['hak_akses']?></option>
                     <option value="Kepala sekolah">Kepala sekolah</option>
                     <option value="Admin">Admin</option>
                     
                 </select>
             </div>
             <?php } ?>
         </div>
         <!-- /.card-body -->
         <div class="card-footer">
             <button type="submit" name="tambah" class="btn btn-primary"><i class="fa fa-check"></i>&nbsp;Update</button>
         </div>
     </form>
 </div>
 <!-- /.card -->