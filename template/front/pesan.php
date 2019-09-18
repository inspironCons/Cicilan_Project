
			<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Contact Us				
							</h1>	
							<p class="text-white link-nav"><a href="">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="">Pesan</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->				  

			<!-- Start contact-page Area -->
			<section class="contact-page-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 d-flex flex-column address-wrap">
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-home"></span>
								</div>
								<div class="contact-details">
									<h5>Cikembar, Kabupaten Sukabumi</h5>
									<p>
										Jl.Palabuhan 2 Road
									</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-phone-handset"></span>
								</div>
								<div class="contact-details">
									<h5>(+62) 858 6315 2125</h5>
									<p>Senin S/d Jumat, Pukul 09.00 - 14.00 WIB</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-envelope"></span>
								</div>
								<div class="contact-details">
									<h5>support@colorlib.com</h5>
									<p>Send us your query anytime!</p>
								</div>
							</div>														
						</div>
						<div class="col-lg-8">
							<form class="form-area" id="form-pesanan" action="" method="post" autocomplete="off" class="contact-form text-right" >
								<div class="row">	
									<div class="col-lg-6 form-group">
										<input id="name" name="name" placeholder="masukan nama asli" onfocus="this.placeholder = ''" onblur="this.placeholder = 'masukan nama asli'" class="common-input mb-20 form-control"  type="text" required>
										<input id="ktp" name="ktp" placeholder="Masukan nomor ktp,wajib 16 angka" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan nomor ktp'" class="common-input mb-20 form-control" maxlength="16" type="text" >
										<input id="kontak"  name="kontak" placeholder="Nomor yang bisa dihubungi" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan kontak anda'" class="common-input mb-20 form-control" maxlength="14" type="text">
										<textarea name="keterangan" id="keterangan" placeholder="masukan keterangan jumlah pesanan, contoh - nastar 1 lusin,parsel paket 2 sebanyak 4" rows="4" cols="48" required></textarea>
									</div>
									<div class="col-lg-6 form-group">
									<select id="menu" class="js-example-basic-multiple col-md-12" name="menu[]" multiple="multiple">
										<option value="AL">Alabama</option>
									</select>
									<!-- <input data-role="tagsinput" id="pesanan" name="pesanan" placeholder="Tulis pesanan satu persatu sesuai di dalam menu" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Silahkan masukan pesanan'" class="common-input mb-20 form-control" required="" type="text">	 -->
									</div>
									<div class="col-lg-12">
										<div class="alert-msg" style="text-align: left;"></div>
										<button id="submit-pesanan" type="submit" class="genric-btn primary" style="float: left;">Kirim Permintaan Pesanan</button>				
									</div>
								</div>
							</form>	
						</div>
					</div>
				</div>	
			</section>
			<!-- End contact-page Area -->