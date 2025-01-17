<?php

use CodeIgniter\Database\BaseUtils;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem R</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <!-- css -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.tailwindcss.css">
    <!-- select 2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
</head>
<body>
<?=$this->include('layouts/components/navigation')?>

<?=$this->include('layouts/components/sidebar')?>

<?= $this->renderSection('content') ?>

<?=$this->include('layouts/components/footer')?>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
<script src="https://cdn.datatables.net/2.0.1/js/dataTables.tailwindcss.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- select 2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    // update status
    $(document).ready(function() {
        $('.update-modal').click(function() {
            var id = $(this).data('user');
            $('#id').val(id);
        })
    })
    function deleteConfirm(event) {
		console.log(event);
		Swal.fire({
			title: 'Konfirmasi hapus data!',
			text: 'Apakah anda yakin ingin menghapus data ini?',
			icon: 'warning',
			showCancelButton: true,
			cancelButtonText: 'Batal',
			confirmButtonText: 'Hapus',
			confirmButtonColor: 'red'
		}).then(dialog => {
			if (dialog.isConfirmed) {
				window.location.assign(event);
			}
		});
	}
    // Datatable
    $('#datatable').DataTable({
        responsive: true,
        ordering: false,
        "oLanguage": {
            "sEmptyTable": "Maaf data belum tersedia."
        },
        "columnDefs": [{
            // "defaultContent": "",
            // "targets": "_all"
        }]
    });
    const passwordToggle = document.querySelector('.js-password-toggle')

    passwordToggle.addEventListener('change', function() {
    const password = document.querySelector('.js-password'),
        passwordLabel = document.querySelector('.js-password-label')

    if (password.type === 'password') {
        password.type = 'text'
        passwordLabel.innerHTML = 'hide'
    } else {
        password.type = 'password'
        passwordLabel.innerHTML = 'show'
    }

    password.focus()
    })
</script>
<?= $this->renderSection('js') ?>

<?php
$session = \Config\Services::session();
$status_error = $session->get('status_error');
$status_success = $session->get('status_success');
?>
<?php if ($status_success) : ?>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			var Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 3000,
				timerProgressBar: true,
				didOpen: (toast) => {
					toast.addEventListener('mouseenter', Swal.stopTimer)
					toast.addEventListener('mouseleave', Swal.resumeTimer)
				}
			})

			Toast.fire({
				icon: 'success',
				title: <?= json_encode($session->getFlashdata('message')) ?>
			})
		});
	</script>
<?php endif; ?>
<?php if ($status_error) : ?>
	<script>
		var Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000,
			timerProgressBar: true,
			didOpen: (toast) => {
				toast.addEventListener('mouseenter', Swal.stopTimer)
				toast.addEventListener('mouseleave', Swal.resumeTimer)
			}
		})

		Toast.fire({
			icon: 'error',
			title: '<?= $session->getFlashdata('error') ?>'
		})
	</script>
<?php endif ?>
</html>
