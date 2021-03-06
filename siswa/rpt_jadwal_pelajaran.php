<?php
include "../global/config.php";
$kelas_id = $_REQUEST['kelas_id'];
$tahun_ajaran = $_REQUEST['tahun_ajaran'];
?>
<html>
    <head>
        <title>Data Pribadi</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link href="../bootstrap/css/bootstrap.css" rel="stylesheet"/>
        <link href="../bootstrap/css/bootstrap-responsive.css" rel="stylesheet"/>
        <link href="../bootstrap/css/style.css" rel="stylesheet"/>
        <script src="../bootstrap/js/jquery-1.7.2.min.js"></script>
        <script src="../bootstrap/js/bootstrap-dropdown.js"></script>
        <script language="JavaScript"  src="../global/jscript.js" type="text/javascript"></script>
        <script language="JavaScript"  src="../global/jscript_pop.js" type="text/javascript"></script>
        <script type="text/javascript" src="../bootstrap/js/jquery.js"></script>
        <script type="text/javascript" src="../bootstrap/js/styletable.jquery.plugin.js"></script>
        <script language="JavaScript">
            $(document).ready(function() {
                $('table').styleTable({
                    th_bgcolor: '#3E83C9',
                    th_color: '#ffffff',
                    th_border_color: '#333333',
                    tr_odd_bgcolor: '#ECF6FC',
                    tr_even_bgcolor: '#ffffff',
                    tr_border_color: '#95BCE2',
                    tr_hover_bgcolor: '#BCD4EC'
                });
            });
        </script>
    </head>

    <body>
        <?php
        include "header_rpt.php";
        ?>
        <br/>
        <div class="span3">
            <h4>JADWAL PELAJARAN</h4>
            <p>TAHUN AJARAN: <?php echo $tahun_ajaran; ?></p>
            <?php
            $hasil_wali = mysql_query("SELECT wali_kelas.ID, wali_kelas.TAHUN_AJARAN, guru.NIP, guru.GLR_DEPAN, guru.NAMA, guru.GLR_BLK, kelas.RUANG
FROM kelas INNER JOIN (guru INNER JOIN wali_kelas ON guru.ID = wali_kelas.ID_GURU) ON kelas.ID = wali_kelas.ID_KELAS
where wali_kelas.TAHUN_AJARAN='$tahun_ajaran' and kelas.ID='$kelas_id'");
            $row_wali = mysql_fetch_array($hasil_wali);
            ?>
            <p>KELAS: <?php echo $row_wali[RUANG]; ?></p>
            <p>WALI KELAS: <?php echo $row_wali[GLR_DEPAN] . " " . $row_wali[NAMA] . " " . $row_wali[GLR_BLK]; ?></p>
        </div>
        <table class="table-bordered">
            <thead> 
            <th colspan="4">SENIN</th>
        </thead>
        <thead> 
        <th>MATA PELAJARAN</th>
        <th>NAMA PENGAJAR</th>
        <th>WAKTU</th>
        <th>JAM</th>
    </thead>
    <?php
    $strsql = "SELECT jadwal.ID_JADWAL, guru.GLR_DEPAN, guru.NAMA, guru.GLR_BLK, matpel.NAMA_MATPEL, jadwal.HARI, jadwal.JAM, jadwal.WAKTU, jadwal.TAHUN_AJARAN, kelas.ID
		FROM kelas INNER JOIN (matpel INNER JOIN (guru INNER JOIN jadwal ON guru.ID = jadwal.ID_GURU) ON matpel.ID_MATPEL = jadwal.ID_MATPEL) ON kelas.ID = jadwal.ID_KELAS
		where jadwal.TAHUN_AJARAN='$tahun_ajaran' and jadwal.HARI='SENIN' and kelas.ID='$kelas_id'";
    $hasil = mysql_query($strsql);
    while ($row = mysql_fetch_array($hasil)) {
        $nama_guru = $row[GLR_DEPAN] . " " . $row[NAMA] . " " . $row[GLR_BLK];
        ?>
        <tr> 
            <td><?php echo $row[NAMA_MATPEL]; ?></td>
            <td><?php echo $nama_guru; ?></td>
            <td><?php echo $row[JAM]; ?> Jam</td>
            <td><?php echo $row[WAKTU]; ?></td>
        </tr>
        <?php
    }
    mysql_free_result($hasil);
    ?>
</table>
<table class="table-bordered">
    <thead> 
    <th colspan="4">SELASA</th>
</thead>
<thead> 
<th>MATA PELAJARAN</th>
<th>NAMA PENGAJAR</th>
<th>WAKTU</th>
<th>JAM</th>
</thead
<?php
$strsql = "SELECT jadwal.ID_JADWAL, guru.GLR_DEPAN, guru.NAMA, guru.GLR_BLK, matpel.NAMA_MATPEL, jadwal.HARI, jadwal.JAM, jadwal.WAKTU, jadwal.TAHUN_AJARAN, kelas.ID
		FROM kelas INNER JOIN (matpel INNER JOIN (guru INNER JOIN jadwal ON guru.ID = jadwal.ID_GURU) ON matpel.ID_MATPEL = jadwal.ID_MATPEL) ON kelas.ID = jadwal.ID_KELAS
		where jadwal.TAHUN_AJARAN='$tahun_ajaran' and jadwal.HARI='RABU' and kelas.ID='$kelas_id'";
$hasil = mysql_query($strsql);
while ($row = mysql_fetch_array($hasil)) {
    $nama_guru = $row[GLR_DEPAN] . " " . $row[NAMA] . " " . $row[GLR_BLK];
    ?>
    <tr> 
        <td><?php echo $row[NAMA_MATPEL]; ?></td>
        <td><?php echo $nama_guru; ?></td>
        <td><?php echo $row[JAM]; ?> Jam</td>
        <td><?php echo $row[WAKTU]; ?></td>
    </tr>
    <?php
}
mysql_free_result($hasil);
?>
</table> 
<br/>
<table class="table-bordered">
    <thead> 
    <th colspan="4">RABU</th>
</thead>
<thead> 
<th>MATA PELAJARAN</th>
<th>NAMA PENGAJAR</th>
<th>WAKTU</th>
<th>JAM</th>
</thead
<?php
$strsql = "SELECT jadwal.ID_JADWAL, guru.GLR_DEPAN, guru.NAMA, guru.GLR_BLK, matpel.NAMA_MATPEL, jadwal.HARI, jadwal.JAM, jadwal.WAKTU, jadwal.TAHUN_AJARAN, kelas.ID
		FROM kelas INNER JOIN (matpel INNER JOIN (guru INNER JOIN jadwal ON guru.ID = jadwal.ID_GURU) ON matpel.ID_MATPEL = jadwal.ID_MATPEL) ON kelas.ID = jadwal.ID_KELAS
		where jadwal.TAHUN_AJARAN='$tahun_ajaran' and jadwal.HARI='JUM`AT' and kelas.ID='$kelas_id'";
$hasil = mysql_query($strsql);
while ($row = mysql_fetch_array($hasil)) {
    $nama_guru = $row[GLR_DEPAN] . " " . $row[NAMA] . " " . $row[GLR_BLK];
    ?>
    <tr> 
        <td><?php echo $row[NAMA_MATPEL]; ?></td>
        <td><?php echo $nama_guru; ?></td>
        <td><?php echo $row[JAM]; ?> Jam</td>
        <td><?php echo $row[WAKTU]; ?></td>
    </tr>
    <?php
}
mysql_free_result($hasil);
?>
</table>
<br/>
<table class="table-bordered">
    <thead> 
    <th colspan="4">KAMIS</th>
</thead>
<thead> 
<th>MATA PELAJARAN</th>
<th>NAMA PENGAJAR</th>
<th>WAKTU</th>
<th>JAM</th>
</thead
<?php
$strsql = "SELECT jadwal.ID_JADWAL, guru.GLR_DEPAN, guru.NAMA, guru.GLR_BLK, matpel.NAMA_MATPEL, jadwal.HARI, jadwal.JAM, jadwal.WAKTU, jadwal.TAHUN_AJARAN, kelas.ID
		FROM kelas INNER JOIN (matpel INNER JOIN (guru INNER JOIN jadwal ON guru.ID = jadwal.ID_GURU) ON matpel.ID_MATPEL = jadwal.ID_MATPEL) ON kelas.ID = jadwal.ID_KELAS
		where jadwal.TAHUN_AJARAN='$tahun_ajaran' and jadwal.HARI='SELASA' and kelas.ID='$kelas_id'";
$hasil = mysql_query($strsql);
while ($row = mysql_fetch_array($hasil)) {
    $nama_guru = $row[GLR_DEPAN] . " " . $row[NAMA] . " " . $row[GLR_BLK];
    ?>
    <tr> 
        <td><?php echo $row[NAMA_MATPEL]; ?></td>
        <td><?php echo $nama_guru; ?></td>
        <td><?php echo $row[JAM]; ?> Jam</td>
        <td><?php echo $row[WAKTU]; ?></td>
    </tr>
    <?php
}
mysql_free_result($hasil);
?>
</table>
<br/>
<table class="table-bordered">
    <thead> 
    <th colspan="4">JUM'AT</th>
</thead>
<thead> 
<th>MATA PELAJARAN</th>
<th>NAMA PENGAJAR</th>
<th>WAKTU</th>
<th>JAM</th>
</thead
<?php
$strsql = "SELECT jadwal.ID_JADWAL, guru.GLR_DEPAN, guru.NAMA, guru.GLR_BLK, matpel.NAMA_MATPEL, jadwal.HARI, jadwal.JAM, jadwal.WAKTU, jadwal.TAHUN_AJARAN, kelas.ID
		FROM kelas INNER JOIN (matpel INNER JOIN (guru INNER JOIN jadwal ON guru.ID = jadwal.ID_GURU) ON matpel.ID_MATPEL = jadwal.ID_MATPEL) ON kelas.ID = jadwal.ID_KELAS
		where jadwal.TAHUN_AJARAN='$tahun_ajaran' and jadwal.HARI='KAMIS' and kelas.ID='$kelas_id'";
$hasil = mysql_query($strsql);
while ($row = mysql_fetch_array($hasil)) {
    $nama_guru = $row[GLR_DEPAN] . " " . $row[NAMA] . " " . $row[GLR_BLK];
    ?>
    <tr> 
        <td><?php echo $row[NAMA_MATPEL]; ?></td>
        <td><?php echo $nama_guru; ?></td>
        <td><?php echo $row[JAM]; ?> Jam</td>
        <td><?php echo $row[WAKTU]; ?></td>
    </tr>
    <?php
}
mysql_free_result($hasil);
?>
</table>
<br/>
<table class="table-bordered">
    <thead> 
    <th colspan="4">SABTU</th>
</thead>
<thead> 
<th>MATA PELAJARAN</th>
<th>NAMA PENGAJAR</th>
<th>WAKTU</th>
<th>JAM</th>
</thead
<?php
$strsql = "SELECT jadwal.ID_JADWAL, guru.GLR_DEPAN, guru.NAMA, guru.GLR_BLK, matpel.NAMA_MATPEL, jadwal.HARI, jadwal.JAM, jadwal.WAKTU, jadwal.TAHUN_AJARAN, kelas.ID
		FROM kelas INNER JOIN (matpel INNER JOIN (guru INNER JOIN jadwal ON guru.ID = jadwal.ID_GURU) ON matpel.ID_MATPEL = jadwal.ID_MATPEL) ON kelas.ID = jadwal.ID_KELAS
		where jadwal.TAHUN_AJARAN='$tahun_ajaran' and jadwal.HARI='SABTU' and kelas.ID='$kelas_id'";
$hasil = mysql_query($strsql);
while ($row = mysql_fetch_array($hasil)) {
    $nama_guru = $row[GLR_DEPAN] . " " . $row[NAMA] . " " . $row[GLR_BLK];
    ?>
    <tr> 
        <td><?php echo $row[NAMA_MATPEL]; ?></td>
        <td><?php echo $nama_guru; ?></td>
        <td><?php echo $row[JAM]; ?> Jam</td>
        <td><?php echo $row[WAKTU]; ?></td>
    </tr>
    <?php
}
mysql_free_result($hasil);
?>
</table>
<br/>
</body>
</html>
