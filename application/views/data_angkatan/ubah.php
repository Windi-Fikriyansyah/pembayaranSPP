<div class="card card-primary">
     <div class="card-header">
         <h6 class="m-0 font-weight-bold text-primary">Edit Data Angkatan</h6>
     </div>
     <!-- /.card-header -->
     <!-- form start -->
     <form action="" method="post">
         <div class="card-body">
             <input type="hidden" name="id" value="<?= $ubah_angkatan['id_angkatan'] ?>">
             <div class="form-group">
                 <label for="exampleInputEmail1">Tahun Angkatan</label>
                 <input type="text" name="tahun" value="<?= $ubah_angkatan['tahun'] ?>" class="form-control" required>
             </div>
             <div class="form-group">
                 <label for="exampleInputEmail1">nominal</label>
                 <input type="text" name="nominal" value="<?= $ubah_angkatan['nominal'] ?>" class="form-control" required>
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