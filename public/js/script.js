$(document).ready(function () {
	let navbarButton = $("#toggleSidebar");
	let navbarButtonMobile = $("#toggleSidebarMobile");
	let sidebar = $("#sidebar");
	let backdrop = $("#sidebarBackdrop");
	let hamburger = $("#toggleSidebarHamburger");
	let hamburgerMobile = $("#toggleSidebarMobileHamburger");
	let closeNav = $("#toggleSidebarClose");
	let closeNavMobile = $("#toggleSidebarMobileClose");
	let searchNavMobile = $("#searchNavBtnMobile");

	$(navbarButton).click(function () {
			$(sidebar).toggleClass("sidebarClose");
			$(sidebar).hover(function () {
					$(this).toggleClass("sidebarClose");
			});
			$(hamburger).toggleClass("hidden");
			$(closeNav).toggleClass("hidden");
	});
	$(navbarButtonMobile).click(function () {
			$(sidebar).toggleClass("hidden");
			$(hamburgerMobile).toggleClass("hidden");
			$(closeNavMobile).toggleClass("hidden");
	});
	$(backdrop).click(function () {
			$(sidebar).addClass("hidden");
			$(hamburgerMobile).removeClass("hidden");
			$(closeNavMobile).addClass("hidden");
	});
	$(searchNavMobile).click(function () {
			$(sidebar).toggleClass("hidden");
			$("body").toggleClass("overflow-hidden");
			$(hamburgerMobile).toggleClass("hidden");
			$(closeNavMobile).toggleClass("hidden");
	});

	// konfirmasi password harus sama
	$("#confirmPass").keyup(function () {
			let password = $("#password").val();
			let confirmPass = $("#confirmPass").val();

			if (confirmPass != password) {
					$('#confimPassMsg').html('Passwords do not match!');
					return false;
			} else {
					$('#confimPassMsg').html('');
					return true;
			}
	});

	// alert hapus
	$('.hapusBtn').click(function (e) {
			e.preventDefault();

			let nama_brg = $(this).data('name');
			let link = $('#formHapus').attr('action');


			$('.namaBrg').html(nama_brg);

			if ($('#modalHapusBtn').click(function () {
							$('#formHapusModal').attr('action', link)
					}));
	});

	var rupiah = document.getElementById('harga_brg');
			rupiah.addEventListener('keyup', function(e) {
					// tambahkan 'Rp.' pada saat form di ketik
					// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
					$('#rupiahOutput').html(formatRupiah(this.value, 'Rp. '));
			});

			/* Fungsi formatRupiah */
			function formatRupiah(angka, prefix) {
					var number_string = angka.replace(/[^,\d]/g, '').toString(),
							split = number_string.split(','),
							sisa = split[0].length % 3,
							rupiah = split[0].substr(0, sisa),
							ribuan = split[0].substr(sisa).match(/\d{3}/gi);

					// tambahkan titik jika yang di input sudah menjadi angka ribuan
					if (ribuan) {
							separator = sisa ? '.' : '';
							rupiah += separator + ribuan.join('.');
					}

					rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
					return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
			}

	// update modal
	$('.editBtn').click(function(e) {

		let id = $(this).val();
		let input_id = $('#id_barang').val(id);
		let url = $('#formUpdate').attr('action')
		$('#formUpdate').attr('action', '/dashboard/dataBarang/produk/' + id);

		let link = $('#formUpdate').attr('action')

		$.ajax({
			type: "GET",
			url: link,
			success: function (success) {
				console.log(success);
				$('#formUpdate #jenis_brg').val(success.barang.jenis_brg);
				$('#formUpdate #merk_brg').val(success.barang.merk_brg);
				$('#formUpdate #stok_brg').val(success.barang.stok_brg);
				$('#formUpdate #harga_brg').val(success.barang.harga_brg);
			}
		});

	});



});