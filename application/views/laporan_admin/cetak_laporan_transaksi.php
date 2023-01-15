<!DOCTYPE html>
<html>
<head>
<title>Faktur Pembayaran</title>

</head>
<body style='font-family:tahoma; font-size:8pt;' onload="window.print()">
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
<span style='font-size:12pt'><b>Tanggal : <?= date('d F Y', strtotime($tgl_akhir)); ?></b></span></br>
</td>
</table>
<table cellspacing='0' style='width:100%; font-size:10pt; font-family:calibri;  border-collapse: collapse;' border='1'>
</br>
<tr align='center'>
                        <th>Tanggal</th>
                        <th>No Invoice</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Subtotal</th>
</tr>
<?php foreach ($lap_transaksi as $lp): ?>
<tr>
  <td><?= $lp['tanggal']; ?></td>
  <td><?= $lp['invoice_spp']; ?></td>
  <td><?= $lp['nis']; ?></td>
  <td><?= $lp['nama']; ?></td>
  <td><?= $lp['nama_kelas']; ?></td>
  <td><?= $lp['grand_total']; ?></td>
  
  
<?php endforeach; ?>

<tr>
<td colspan = '5'><div style='text-align:left; font-size:14pt'><b>Total Transaksi</b></div></td>
<td style='text-align:left; font-size:14pt'><b>Rp. <?= number_format($grand_total, 2, ',','.'); ?></b></td>
</tr>
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