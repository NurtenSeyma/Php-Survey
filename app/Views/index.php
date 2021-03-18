<!DOCTYPE html>
<html lang="tr-TR">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> 
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

	<title>Proje 1</title>
</head>
<body>
	<h4 class="text-center mt-3">Anket Projesi</h4>
	<div class="container">
		<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addSurvey"><i class="fa fa-plus"></i></button>
		<a target="_blank" href="<?=base_url("/Home/TestSmsApi")?>" class="btn btn-warning">Sms Api Test</a>
		<div class="clearfix pb-3"></div>
		<table id="datatable" class="table table-striped">
			<thead>
				<th>ID</th>
				<th>Tarih</th>
				<th>Cevap 1</th>
				<th>Cevap 2</th>
				<th>Cevap 3</th>
				<th>Cevap 4</th>
				<th>Cevap 5</th>
				<th>Ortalama</th>
			</thead>
			<tbody>
				<?php foreach ($anket as $key => $value): ?>
					<tr>
						<td><?=$value->id?></td>
						<td><?=$value->tarih?></td>
						<td><?=$value->cevap1?></td>
						<td><?=$value->cevap2?></td>
						<td><?=$value->cevap3?></td>
						<td><?=$value->cevap4?></td>
						<td><?=$value->cevap5?></td>
						<td><?=($value->cevap1+$value->cevap2+$value->cevap3+$value->cevap4+$value->cevap5)/5?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="addSurvey" tabindex="-1" aria-labelledby="addSurveyLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-uppercase" id="addSurveyLabel">Yeni anket ekle</h5>
					<button type="button" class=" btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form id="addAnswerForm">
						<div class="mb-3">
							<label for="answer1" class="form-label">Cevap 1</label>
							<select class="form-control" id="answer1" >
								<option value="100">Çok iyi</option>
								<option value="80">İyi</option>
								<option value="60">Orta</option>
								<option value="40">Kötü</option>
								<option value="20">Çok kötü</option>
							</select>
						</div>
						<div class="mb-3">
							<label for="answer2" class="form-label">Cevap 2</label>
							<select class="form-control" id="answer2" >
								<option value="100">Çok iyi</option>
								<option value="80">İyi</option>
								<option value="60">Orta</option>
								<option value="40">Kötü</option>
								<option value="20">Çok kötü</option>
							</select>
						</div>
						<div class="mb-3">
							<label for="answer3" class="form-label">Cevap 3</label>
							<select class="form-control" id="answer3" >
								<option value="100">Çok iyi</option>
								<option value="80">İyi</option>
								<option value="60">Orta</option>
								<option value="40">Kötü</option>
								<option value="20">Çok kötü</option>
							</select>
						</div>
						<div class="mb-3">
							<label for="answer4" class="form-label">Cevap 4</label>
							<select class="form-control" id="answer4">
								<option value="100">Çok iyi</option>
								<option value="80">İyi</option>
								<option value="60">Orta</option>
								<option value="40">Kötü</option>
								<option value="20">Çok kötü</option>
							</select>
						</div>
						<div class="mb-3">
							<label for="answer5" class="form-label">Cevap 5</label>
							<select class="form-control" id="answer5">
								<option value="100">Çok iyi</option>
								<option value="80">İyi</option>
								<option value="60">Orta</option>
								<option value="40">Kötü</option>
								<option value="20">Çok kötü</option>
							</select>
						</div>
						<button type="submit" class="btn btn-success">Ekle</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Optional JavaScript; choose one of the two! -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(document).ready( function () {
			$('#datatable').DataTable();
		} );
		$("form#addAnswerForm").submit(function(e) {
			e.preventDefault();    
			var formData ={};
			formData.answer1= $("#answer1").val();
			formData.answer2= $("#answer2").val();
			formData.answer3= $("#answer3").val();
			formData.answer4= $("#answer4").val();
			formData.answer5= $("#answer5").val();
			$.ajax({
				url: "<?=base_url()?>/Home/insert",
				type: 'post',
				data: formData,
				error: function(request, error) {
					alert("Bir hata ile karşılaşıldı");
				},
				success: function(response) {
					alert(response);
				}
			});
		});
	</script>
</body>
</html>