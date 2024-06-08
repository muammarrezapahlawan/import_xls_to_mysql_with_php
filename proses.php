<?php 

include "koneksi.php";
include "excel_reader2.php";

$dataFrame = new Spreadsheet_Excel_Reader($_FILES['userFile']['tmp_name']);
$baris = $dataFrame->rowcount($sheet_index=0);

$berhasil=0;
$gagal=0;

for($i=2; $i<=$baris;$i++){
    $nim=$dataFrame->val($i,1);
    $nama=$dataFrame->val($i,2);
    $alamat=$dataFrame->val($i,3);

    $query = mysqli_query($koneksi,"INSERT INTO mhs VALUES('$nim','$nama','$alamat')");

    if($query){
        $berhasil++;
    }else{
        $gagal++;
    }

    

}

    echo " <h3>Proses Import Selesai</h3>";
    echo "Jumlah data berhasil import : ".$berhasil."";
    echo "Jumlah data gagal import : ".$gagal."";



?>