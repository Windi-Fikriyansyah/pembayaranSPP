<!-- Custom fonts for this template-->
<link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/js/sweetalert2.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/select2/css/select2.min.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"> 

<!DOCTYPE html>
<html>
<head>
<title>Faktur Pembayaran</title>

</head>
<body style='font-family:tahoma; font-size:8pt;' onload="window.print()">

<a class="btn btn-primary mt-2 ml-1" style="font-size: 13px;" href="<?= base_url('pembayaran_spp') ?>" role="button">Back</a>

<div style="text-align:justify; margin-top: 20px">
    <img src="<?php echo base_url(); ?>assets/img/logo.png" style="width: 87px; height: 90px; float:left; margin:0 8px 4px 0;"/>
    
    
    
    <p style="text-align: center; line-height: 20px">
      <span style="font-size: 15px">LAPORAN PEMBAYARAN SISWA</span><br/>
      <span style="font-size: 20px;"><strong>SMA BOEDI OETOMO PONTIANAK</strong></span><br/>
      <span style="font-size: 12px">Jl. Parit H. Husin II</span><br/>
      <span style="font-size: 12px">No Hp : (0561)710470</span>
      <hr>
    </p>
    
     </div>
<center>
<table style='width:100%; font-size:8pt; font-family:calibri; border-collapse: collapse;' border = '0'>
<td width='100%' align='left' style='padding-right:80px; vertical-align:top'>

</td>
</table>
<table cellspacing='0' style='width:100%; font-size:10pt; font-family:calibri;  border-collapse: collapse;' border='1'>
</br>
<tr align='center'>
                        <th>Tanggal Pembayaran</th>
                        <th>bulan</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Nominal</th>
</tr>
<?php foreach ($cetak as $ct): ?>
<tr>
  <td><?= $ct["tanggal"]; ?></td>
  <td><?= $ct['bulan']; ?></td>
  <td><?= $ct['nis']; ?></td>
  <td><?= $ct['nama']; ?></td>
  <td><?= $ct['grand_total']; ?></td>
  <tr>
<td colspan = '4'><div style='text-align:left; font-size:14pt'><b>Total Transaksi</b></div></td>
<td style='text-align:left; font-size:14pt'><b>Rp. <?= $ct['grand_total']; ?></b></td>
</tr>
  
<?php endforeach; ?>


</table>

<table style='width:100%; font-size:7pt;' cellspacing='2'>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<tr>
<td style='border:0px solid black; padding:5px; text-align:left; width:80%'></td>
<td align='center'>Pontianak, <?= date('d F Y'); ?></br>Penanggung Jawab,
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
<u>..................</u>
</td>
</tr>
</table>
</center>
</body>




</html>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url(); ?>assets/js/demo/chart-area-demo.js"></script>
<script src="<?= base_url(); ?>assets/js/demo/chart-pie-demo.js"></script>
<!-- data tabel -->
<script src="<?= base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url(); ?>assets/js/demo/datatables-demo.js"></script>

<script src="<?= base_url(); ?>assets/js/sweetalert2.all.min.js"></script>
<script src="<?= base_url(); ?>assets/js/myscript.js"></script>
<script src="<?= base_url(); ?>assets/vendor/select2/js/select2.full.min.js"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>