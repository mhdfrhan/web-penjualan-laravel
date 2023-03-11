$(window).on('load', function () {
	$('#loader').fadeOut(500);
});

$(document).ready(function () {

// Fungsi untuk menampilkan waktu saat ini dalam format "jam:menit:detik"
function displayTime() {
	// Dapatkan waktu saat ini
	var currentTime = new Date();
	// Dapatkan jam, menit, dan detik dari waktu saat ini
	var hours = currentTime.getHours();
	var minutes = currentTime.getMinutes();
	var seconds = currentTime.getSeconds();
	// Tambahkan angka 0 di depan jam, menit, dan detik jika nilainya kurang dari 10
	hours = (hours < 10 ? "0" : "") + hours;
	minutes = (minutes < 10 ? "0" : "") + minutes;
	seconds = (seconds < 10 ? "0" : "") + seconds;
	// Gabungkan jam, menit, dan detik menjadi satu string
	var timeString = hours + ":" + minutes + ":" + seconds;
	// Tampilkan waktu saat ini pada elemen dengan id "clock"
	$("#clock").html(timeString);
}

// Jalankan fungsi displayTime() setiap satu detik
setInterval(displayTime, 1000);


	setTimeout(function () {
		$(".alert").fadeOut("slow");
	}, 5000); // 5000 milidetik = 5 detik

	var swiper = new Swiper(".banner", {
		pagination: {
			el: ".swiper-pagination",
			clickable: true,
		},
		spaceBetween: 30,
		autoplay: true,
		speed: 3000
	});

	var swiper = new Swiper(".testimonials", {
		pagination: {
			el: ".swiper-pagination",
			clickable: true,
		},
		breakpoints: {
			640: {
				slidesPerView: 2,
				spaceBetween: 30,
			},
			1280: {
				slidesPerView: 3,
				spaceBetween: 30,
			},
		},
		spaceBetween: 30,
		speed: 2000
	});

	var swiper = new Swiper(".kategori", {
		pagination: {
			el: ".swiper-pagination",
			clickable: true,
		},
		breakpoints: {
			0: {
				slidesPerView: 2,
			},
			640: {
				slidesPerView: 3,
			},
			1280: {
				slidesPerView: 4,
			},
		},
		spaceBetween: 30,
		speed: 1000
	});

	AOS.init({
		once: true,
	});


	const navbarButton = $("#toggleSidebar");
	const navbarButtonMobile = $("#toggleSidebarMobile");
	const sidebar = $("#sidebar");
	const backdrop = $("#sidebarBackdrop");
	const hamburger = $("#toggleSidebarHamburger");
	const hamburgerMobile = $("#toggleSidebarMobileHamburger");
	const closeNav = $("#toggleSidebarClose");
	const closeNavMobile = $("#toggleSidebarMobileClose");
	const searchNavMobile = $("#searchNavBtnMobile");

	navbarButton.click(() => {
		sidebar.toggleClass("sidebarClose").hover(() => sidebar.toggleClass("sidebarClose"));
		hamburger.toggleClass("hidden");
		closeNav.toggleClass("hidden");
	});

	navbarButtonMobile.click(() => {
		sidebar.toggleClass("hidden");
		hamburgerMobile.toggleClass("hidden");
		closeNavMobile.toggleClass("hidden");
	});

	backdrop.click(() => {
		sidebar.addClass("hidden");
		hamburgerMobile.removeClass("hidden");
		closeNavMobile.addClass("hidden");
	});

	searchNavMobile.click(() => {
		sidebar.toggleClass("hidden");
		$("body").toggleClass("overflow-hidden");
		hamburgerMobile.toggleClass("hidden");
		closeNavMobile.toggleClass("hidden");
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

	// back to top
	// Menampilkan tombol "back to top" ketika pengguna menggulir lebih dari 100 piksel
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			$('#back2Top').removeClass('invisible opacity-0').addClass('visible opacity-100');
		} else {
			$('#back2Top').removeClass('visible opacity-100').addClass('invisible opacity-0');
		}
	});

	// Menggulir back to top saat pengguna mengklik tombol "back to top"
	$('#back2Top').click(function () {
		$('html, body').animate({ scrollTop: 0 }, 800);
		return false;
	});


	// Ambil semua button tab
	var tabButtons = $('#myTab button');

	// Cari button yang memiliki attribute aria-selected="true"
	var selectedTabButton = tabButtons.filter('[aria-selected="true"]');

	// Tambahkan class border-violet-600 pada button yang memiliki attribute aria-selected="true"
	selectedTabButton.addClass('border-violet-600 text-violet-600');

	// Tambahkan event click pada button tab
	tabButtons.click(function () {
		// Hapus class pada semua button tab
		tabButtons.removeClass('border-violet-600 text-violet-600');

		// Tambahkan class pada button yang di-klik
		$(this).addClass('border-violet-600 text-violet-600');
	});


	// alert hapus
	$('.hapusBtn').click(function (e) {
		e.preventDefault();

		let nama_brg = $(this).data('name');
		let id = $(this).val()
		let link = $('#formHapus').attr('action');


		$('.namaBrg').html(nama_brg);


		$('#formHapusModal').attr('action', link + id)

	});

	var rupiah = document.getElementById('harga_brg');
	$(rupiah).keyup(function (e) {
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
	$('.editBtn').click(function (e) {

		let slug = $(this).val();
		let oldImage = $(this).data('image');
		$('#formUpdate').attr('action', '/dashboard/dataBarang/produk/' + slug);

		let link = $('#formUpdate').attr('action')

		$.ajax({
			type: "GET",
			url: link,
			success: function (success) {
				console.log(success);
				$('#formUpdate #category_id').val(success.barang.category_id).change();
				$('#formUpdate #merk_brg').val(success.barang.merk_brg);
				$('#formUpdate #stok_brg').val(success.barang.stok_brg);
				$('#formUpdate #harga_brg').val(success.barang.harga_brg);
				$('#oldImage').val(success.barang.image);

				if ($('.img-preview').attr('src', oldImage + '/' + success.barang.image)) {
					$('.img-preview').addClass('block mb-6');

					if ($('.img-preview').attr('src') == '/storage/null') {
						$('.img-preview').attr('src', '');
						$('.img-preview').removeClass('block mb-6');
					}
				}
			}
		});

	});

	$('#tambahBarangBtn').click(function () {
		$('.img-preview').attr('src', '');
		$('.img-preview').removeClass('block mb-6 w-40')
	});

	$('.editBtn2').click(function (e) {

		let slug = $(this).val();
		// let url = $('#formUpdate').attr('action')
		$('#formUpdate').attr('action', '/dashboard/kategori/produk/' + slug);

		let link = $('#formUpdate').attr('action')

		$.ajax({
			type: "GET",
			url: link,
			success: function (success) {
				console.log(success);
				$('#formUpdate #nama_kategori').val(success.kategori.name);
			}
		});

	});

	function previewImage(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('.img-preview').attr('src', e.target.result);
				$('.img-preview').hide();
				$('.img-preview').fadeIn(650);
				$('.img-preview').addClass('block mb-6 w-40');
			}
			reader.readAsDataURL(input.files[0]);
		}
	}

	let image = document.querySelectorAll('#image')

	$(image).change(function () {
		previewImage(this);
	});

	$('.searchIcon').click(function () {
		$('#searchForm').addClass('active');
	});

	$('.closeForm').click(function () {
		$('#searchForm').removeClass('active');
	});


});