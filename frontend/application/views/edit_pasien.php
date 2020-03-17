<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="format-detection" content="telephone=no" />
<meta name="robots" content="index, follow">
<meta name="author" content="Wira Dwi Susanto">
<title><?php echo $title; ?></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<style type="text/css">
/* Absolute Center Spinner */
.loading {
  position: fixed;
  z-index: 999;
  height: 2em;
  width: 2em;
  overflow: visible;
  margin: auto;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
}

/* Transparent Overlay */
.loading:before {
  content: '';
  display: block;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.3);
}

/* :not(:required) hides these rules from IE9 and below */
.loading:not(:required) {
  /* hide "loading..." text */
  font: 0/0 a;
  color: transparent;
  text-shadow: none;
  background-color: transparent;
  border: 0;
}

.loading:not(:required):after {
  content: '';
  display: block;
  font-size: 10px;
  width: 1em;
  height: 1em;
  margin-top: -0.5em;
  -webkit-animation: spinner 1500ms infinite linear;
  -moz-animation: spinner 1500ms infinite linear;
  -ms-animation: spinner 1500ms infinite linear;
  -o-animation: spinner 1500ms infinite linear;
  animation: spinner 1500ms infinite linear;
  border-radius: 0.5em;
  -webkit-box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.5) -1.5em 0 0 0, rgba(0, 0, 0, 0.5) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
  box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) -1.5em 0 0 0, rgba(0, 0, 0, 0.75) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
}

/* Animation */

@-webkit-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-moz-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-o-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
</style>
<div class="container" style="margin-top: 100px; margin-bottom: 100px;">
<div class="loading" name="loading" id="loading" style="display: none;">Loading&#8230;</div>
<h3 style="text-align: center; margin-bottom: 50px;"><b>Data Pasien</b></h3>
<button type="button" name="tambahDataBtn" id="tambahDataBtn" onclick="tambahkanData();" class="btn btn-danger"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</button><br><br>
<div style="height:auto;overflow:auto; margin-bottom: 30px;" class="table-responsive">
<table class="table">
    <thead class="thead-dark">
      <tr>
      	<th>No</th>
      	<th>ID</th>
        <th>Nama</th>
        <th>Ruang</th>
        <th>Alamat</th>
        <th>Umur</th>
        <th>Gol Darah</th>
        <th>Jenis Kelamin</th>
        <th>Keluhan</th>
        <th>Edit</th>
        <th>Hapus</th>
      </tr>
    </thead>
    <tbody>
    <?php 
    $tampung = json_decode($this->session->flashdata('datapasien'), true);

    $setNo = 1;
    for($ok = 0; $ok < sizeof($tampung['data']); $ok++)
    {
    	if($tampung['data'][$ok]['jenis_kelamin'] == 1)
    	{
    		$setJenisKelamin = "Pria";
    	}

    	else if($tampung['data'][$ok]['jenis_kelamin'] == 2)
    	{
    		$setJenisKelamin = "Perempuan";
    	}

    	else if($tampung['data'][$ok]['jenis_kelamin'] == 3)
    	{
    		$setJenisKelamin = "Lain-lain";
    	}

    	else
    	{
    		$setJenisKelamin = "Tidak diketahui";
    	}

    	$okId = (int)$tampung['data'][$ok]['id'];
    	echo '<tr>
    	<td>' . $setNo . '</td>
        <td>' . $tampung['data'][$ok]['id'] . '</td>
        <td>' . $tampung['data'][$ok]['nama_lengkap'] . '</td>
        <td>' . $tampung['data'][$ok]['ruang_pasien'] . '</td>
        <td>' . $tampung['data'][$ok]['alamat'] . '</td>
        <td>' . $tampung['data'][$ok]['umur'] . '</td>
        <td>' . $tampung['data'][$ok]['golongan_darah'] . '</td>
        <td>' . $setJenisKelamin . '</td>
        <td>' . $tampung['data'][$ok]['keluhan'] . '</td>
        <td style="color: #0d75a8;"><p title="Edit" style="cursor: pointer;" onclick="doEdit(' . $okId . ')">' . '<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</p></td>
        <td style="color: #0d75a8;"><p title="Hapus" style="cursor: pointer;" onclick="doHapus(' . $okId . '); return false;">' . '<i class="fa fa-trash-o" aria-hidden="true"></i> Hapus</p></td>
      </tr>';
    	$setNo++;
    }
    ?>
    </tbody>
  </table>
</div>
<!--BAGIAN MODAL NYA-->
<button type="button" style="display: none;" name="buttonModal" id="buttonModal" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Open modal
  </button>
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h1 class="modal-title" name="edit_pasien_id" id="edit_pasien_id">Edit Pasien</h1>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <h3 name="instruksiEdit" id="instruksiEdit">Silakan perbarui data di bawah ini</h3>
          <div class="form-group">
		    <label for="nama_lengkap">Nama Lengkap:</label>
		    <input type="text" class="form-control" placeholder="Nama Lengkap..." value="" name="nama_lengkap" id="nama_lengkap" maxlength="64" required>
		  </div>
		  <div class="form-group">
		    <label for="ruang_pasien">Ruang Pasien:</label>
		    <input type="text" class="form-control" placeholder="Ruang Pasien..." value="" name="ruang_pasien" id="ruang_pasien" maxlength="64" required>
		  </div>
		  <div class="form-group">
		    <label for="alamat">Alamat:</label>
		    <input type="text" class="form-control" placeholder="Alamat..." value="" name="alamat" id="alamat" maxlength="128" required>
		  </div>
		  <div class="form-group">
		    <label for="umur">Umur:</label>
		    <input type="number" class="form-control" placeholder="Umur..." value="" name="umur" id="umur" maxlength="6" required>
		  </div>
		  <div class="form-group">
		    <label for="golongan_darah">Golongan Darah:</label>
		    <input type="text" class="form-control" placeholder="Golongan Darah..." value="" name="golongan_darah" id="golongan_darah" maxlength="6" required>
		  </div>
		  <div class="form-group">
		    <label for="jenis_kelamin">Jenis Kelamin:</label>
		    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
		    <option value="1">Pria</option>
		    <option value="2">Perempuan</option>
		    <option value="3">Lainnya</option>
		    </select>
		  </div>
		  <div class="form-group">
		    <label for="keluhan">Keluhan:</label>
		    <input type="text" class="form-control" placeholder="Keluhan..." value="" name="keluhan" id="keluhan" maxlength="64" required>
		  </div>
		  <button type="button" style="display: none;" name="perbaruiBtn" id="perbaruiBtn" onclick="perbaruiData();" class="btn btn-primary"><i class="fa fa-sign-in" aria-hidden="true"></i> Perbarui Data</button> <button type="button" name="tmbhData" style="display: none;" id="tmbhData" onclick="konfirmTambahData();" class="btn btn-primary"><i class="fa fa-sign-in" aria-hidden="true"></i> Tambahkan Data</button>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" name="resetBtn" id="resetBtn" onclick="reset();" class="btn btn-primary"><i class="fa fa-eraser" aria-hidden="true"></i> Reset</button> <button type="button" name="buttonClose" id="buttonClose" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Batal</button>
        </div>
        
      </div>
    </div>
  </div>
<!--END BAGIAN MODAL NYA-->
<div class="card bg-dark text-white">
<div class="card-body"><center>Nama: Wira Dwi Susanto (NIM: 17.01.53.0053)</center></div>
</div>
</div>
<script type="text/javascript">
var currentId = 0;
function doEdit(getId)
{
	var id = getId;

	$.ajax({
        type:'POST',
        url: "https://api2.kmsp-store.com/get_pasien",
        'data':JSON.stringify({"id":id, "filter":"byid"}),
        dataType:'JSON',
        'contentType': 'application/json',
        error:function(xhr, ajaxOptions, thrownError){
        $('#loading').css('display', 'none');
        alert("Gagal menangkap informasi!");
        },
        cache:false,
        beforeSend:function(request){
        request.setRequestHeader("Authorization", "Basic N2Q5NmY2OTc5MDMxOWNmNmM1ZmViMjU4NDllYjQ0ODU6MGFhYmZkYjEwN2EwYTBjYmI0YTVlYTk3MjQyOTZjZGM==");
        request.setRequestHeader("clientId", "61fc89692eefa0b1a73f74a837b81a59");
        $('#loading').css('display', 'inline-block');
        },
        success:function(s){
        //console.log(s);
	        if(s['Code'] == "01")
	        {
	        	//GAGAL
	        	alert("Gagal menangkap informasi!");
	        }

	        if(s['Code'] == "00")
	        {
	        	get_jenis_kelamin = s['data'][0]['jenis_kelamin'];

	        	if(get_jenis_kelamin != 1 && get_jenis_kelamin != 2 && get_jenis_kelamin != 3)
	        	{
	        		$get_jenis_kelamin = 1;
	        	}

                $('#perbaruiBtn').css('display', 'inline-block');
                $('#tmbhData').css('display', 'none');
                $('#instruksiEdit').html('Silakan perbarui data di bawah ini');

	        	currentId = s['data'][0]['id'];
	        	$('#edit_pasien_id').html('Edit Pasien #' + s['data'][0]['id']);
	        	$('#nama_lengkap').val(s['data'][0]['nama_lengkap']);
	        	$('#ruang_pasien').val(s['data'][0]['ruang_pasien']);
	        	$('#alamat').val(s['data'][0]['alamat']);
	        	$('#umur').val(s['data'][0]['umur']);
	        	$('#golongan_darah').val(s['data'][0]['golongan_darah']);
	        	$('#jenis_kelamin').val(get_jenis_kelamin);
	        	$('#keluhan').val(s['data'][0]['keluhan']);

	        	$("#buttonModal").click();
	        	$('#loading').css('display', 'none');
	        }
        }
        });
}

function reset()
{
	$('#nama_lengkap').val('');
	$('#ruang_pasien').val('');
	$('#alamat').val('');
	$('#umur').val('0');
	$('#golongan_darah').val('');
	$('#jenis_kelamin').val('1');
	$('#keluhan').val('');
	alert("Field telah berhasil di-reset!");
}

function perbaruiData()
{
	if(currentId == "" || currentId == 0 || currentId < 0)
	{
		alert("Invalid Request");
		return false;
	}

	else
	{
		var nama_lengkap = $('#nama_lengkap').val();
		var ruang_pasien = $('#ruang_pasien').val();
		var alamat = $('#alamat').val();
		var umur = $('#umur').val();
		var golongan_darah = $('#golongan_darah').val();
		var jenis_kelamin = $('#jenis_kelamin').val();
		var keluhan = $('#keluhan').val();

		if(nama_lengkap == "" || ruang_pasien == "" || alamat == "" || umur == "" || golongan_darah == "" || jenis_kelamin == "" || keluhan == "")
		{
			alert("Harap lengkapi semua data terlebih dahulu!");
			return false;
		}

		else
		{
			$.ajax({
	        type:'PUT',
	        url: "https://api2.kmsp-store.com/edit_pasien/" + currentId,
	        'data':JSON.stringify({"nama_lengkap":nama_lengkap, "ruang_pasien":ruang_pasien, "alamat":alamat, "umur":umur, "golongan_darah":golongan_darah, "jenis_kelamin":jenis_kelamin, "keluhan":keluhan}),
	        dataType:'JSON',
	        'contentType': 'application/json',
	        error:function(xhr, ajaxOptions, thrownError){
	        $('#loading').css('display', 'none');
	        alert("Gagal memperbarui data pasien!");
	        },
	        cache:false,
	        beforeSend:function(request){
	        request.setRequestHeader("Authorization", "Basic N2Q5NmY2OTc5MDMxOWNmNmM1ZmViMjU4NDllYjQ0ODU6MGFhYmZkYjEwN2EwYTBjYmI0YTVlYTk3MjQyOTZjZGM==");
	        request.setRequestHeader("clientId", "61fc89692eefa0b1a73f74a837b81a59");
	        $('#loading').css('display', 'inline-block');
	        $("#buttonClose").click();
	        },
	        success:function(s){
	        //console.log(s);
		        if(s['Code'] == "01")
		        {
		        	//GAGAL
		        	$('#loading').css('display', 'none');
		        	alert(s['message']);
		        }

		        if(s['Code'] == "00")
		        {
	        		$('#loading').css('display', 'none');
		        	alert("Sukses! " + s['message']);
		        	$('#nama_lengkap').val('');
					$('#ruang_pasien').val('');
					$('#alamat').val('');
					$('#umur').val('0');
					$('#golongan_darah').val('');
					$('#jenis_kelamin').val('1');
					$('#keluhan').val('');
					window.location.reload();
		        }
	        }
	        });
		}
	}
}

function doHapus(getId)
{
	var id = getId;

	if(id == "")
	{
		alert("ID Kosong!");
		return false;
	}

	else
	{
		var konfirmasiText1 = confirm("Apakah Anda yakin ingin menghapus data pasien ini?");
		if(konfirmasiText1 === true)
		{
		    $.ajax({
	        type:'GET',
	        url: "https://api2.kmsp-store.com/hapus_pasien/" + id,
	        data:{},
	        dataType:'JSON',
	        'contentType': 'application/x-www-form-urlencoded',
	        error:function(xhr, ajaxOptions, thrownError){
	        $('#loading').css('display', 'none');
	        alert("Gagal menghapus data pasien!");
	        },
	        cache:false,
	        beforeSend:function(request){
	        request.setRequestHeader("Authorization", "Basic N2Q5NmY2OTc5MDMxOWNmNmM1ZmViMjU4NDllYjQ0ODU6MGFhYmZkYjEwN2EwYTBjYmI0YTVlYTk3MjQyOTZjZGM==");
	        request.setRequestHeader("clientId", "61fc89692eefa0b1a73f74a837b81a59");
	        $('#loading').css('display', 'inline-block');
	        },
	        success:function(s){
	        //console.log(s);
		        if(s['Code'] == "01")
		        {
		        	//GAGAL
		        	$('#loading').css('display', 'none');
		        	alert("Gagal menghapus data pasien!");
		        }

		        if(s['Code'] == "00")
		        {
	        		$('#loading').css('display', 'none');
		        	alert("Sukses! " + s['message']);
					window.location.reload();
		        }
	        }
	        });    
		}

		else
		{
			//
		}
	}
}

function tambahkanData()
{
    $('#nama_lengkap').val('');
	$('#ruang_pasien').val('');
	$('#alamat').val('');
	$('#umur').val('0');
	$('#golongan_darah').val('');
	$('#jenis_kelamin').val('1');
	$('#keluhan').val('');
    $('#perbaruiBtn').css('display', 'none');
    $('#tmbhData').css('display', 'inline-block');
    $('#edit_pasien_id').html('Tambah Pasien');
    $('#instruksiEdit').html('Silakan masukkan data pasien di bawah ini');
    $('#buttonModal').click();
}

function konfirmTambahData()
{
            var nama_lengkap = $('#nama_lengkap').val();
    		var ruang_pasien = $('#ruang_pasien').val();
    		var alamat = $('#alamat').val();
    		var umur = $('#umur').val();
    		var golongan_darah = $('#golongan_darah').val();
    		var jenis_kelamin = $('#jenis_kelamin').val();
    		var keluhan = $('#keluhan').val();
    
    		if(nama_lengkap == "" || ruang_pasien == "" || alamat == "" || umur == "" || golongan_darah == "" || jenis_kelamin == "" || keluhan == "")
    		{
    			alert("Harap lengkapi semua data terlebih dahulu!");
    			return false;
    		}
    
    		else
    		{
                $.ajax({
    	        type:'POST',
    	        url: "https://api2.kmsp-store.com/insert_pasien",
    	        'data':JSON.stringify({"nama_lengkap":nama_lengkap, "ruang_pasien":ruang_pasien, "alamat":alamat, "umur":umur, "golongan_darah":golongan_darah, "jenis_kelamin":jenis_kelamin, "keluhan":keluhan}),
    	        dataType:'JSON',
    	        'contentType': 'application/json',
    	        error:function(xhr, ajaxOptions, thrownError){
    	        $('#loading').css('display', 'none');
    	        alert("Gagal menambah data pasien!");
    	        },
    	        cache:false,
    	        beforeSend:function(request){
    	        request.setRequestHeader("Authorization", "Basic N2Q5NmY2OTc5MDMxOWNmNmM1ZmViMjU4NDllYjQ0ODU6MGFhYmZkYjEwN2EwYTBjYmI0YTVlYTk3MjQyOTZjZGM==");
    	        request.setRequestHeader("clientId", "61fc89692eefa0b1a73f74a837b81a59");
    	        $('#loading').css('display', 'inline-block');
    	        $("#buttonClose").click();
    	        },
    	        success:function(s){
    	        //console.log(s);
    		        if(s['Code'] == "01")
    		        {
    		        	//GAGAL
    		        	$('#loading').css('display', 'none');
    		        	alert(s['message']);
    		        }
    
    		        if(s['Code'] == "00")
    		        {
    	        		$('#loading').css('display', 'none');
    		        	alert("Sukses! " + s['message']);
    		        	$('#nama_lengkap').val('');
    					$('#ruang_pasien').val('');
    					$('#alamat').val('');
    					$('#umur').val('0');
    					$('#golongan_darah').val('');
    					$('#jenis_kelamin').val('1');
    					$('#keluhan').val('');
    					window.location.reload();
    		        }
    	        }
    	        });
    		}
}
</script>
</body>
</html>