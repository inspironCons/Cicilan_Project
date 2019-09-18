var host = window.location.hostname;
var path = window.location.pathname;

$(document).ready(function() {
    "use strict";

    var window_width = $(window).width(),
        window_height = window.innerHeight,
        header_height = $(".default-header").height(),
        header_height_static = $(".site-header.static").outerHeight(),
        fitscreen = window_height - header_height;

    $(".fullscreen").css("height", window_height)
    $(".fitscreen").css("height", fitscreen);

    //------- Niceselect  js --------//  

    if (document.getElementById("default-select")) {
        $('select').niceSelect();
    };
    if (document.getElementById("service-select")) {
        $('select').niceSelect();
    };

    //------- Lightbox  js --------//  

    $('.img-gal').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }
    });

    $('.play-btn').magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });

    //------- Datepicker  js --------//  

      $( function() {
        $( "#datepicker" ).datepicker();
        $( "#datepicker2" ).datepicker();
      } );


    //------- Superfist nav menu  js --------//  

    $('.nav-menu').superfish({
        animation: {
            opacity: 'show'
        },
        speed: 400
    });


    if ( $(".site-content").hasClass("instagram") ) {
        footerIntagram();
    }


    function footerIntagram(){
        var feed = new Instafeed({
            target: "footer-ig-stream",
            get: "user",
            limit : 6,
            resolution: 'standard_resolution',
            userId: 2159114835,
            accessToken: "2159114835.9e667eb.7a37f9b944ea4023b94541c661cbf43d",
            template: '<a href="{{image}}" class="mfp-ig-popup" data-effect="mfp-zoom-in" title="{{title}}"><img src="{{image}}" alt="{{caption}}"></a>',
            after: function() {
                $(".mfp-ig-popup").magnificPopup({
                    type: "image",
                    removalDelay: 500, //delay removal by X to allow out-animation
                    image: {
                        cursor: null
                    },
                    gallery: {
                        enabled: true // set to false to disable gallery
                    },
                    callbacks: {
                        beforeOpen: function() {
                            // just a hack that adds mfp-anim class to markup 
                            this.st.image.markup = this.st.image.markup.replace("mfp-figure", "mfp-figure mfp-with-anim");
                            this.st.mainClass = this.st.el.attr("data-effect");
                        }
                    },
                    midClick: true
                });
            }
        });
        feed.run();
    }
    

    //------- Mobile Nav  js --------//  

    if ($('#nav-menu-container').length) {
        var $mobile_nav = $('#nav-menu-container').clone().prop({
            id: 'mobile-nav'
        });
        $mobile_nav.find('> ul').attr({
            'class': '',
            'id': ''
        });
        $('body').append($mobile_nav);
        $('body').prepend('<button type="button" id="mobile-nav-toggle"><i class="lnr lnr-menu"></i></button>');
        $('body').append('<div id="mobile-body-overly"></div>');
        $('#mobile-nav').find('.menu-has-children').prepend('<i class="lnr lnr-chevron-down"></i>');

        $(document).on('click', '.menu-has-children i', function(e) {
            $(this).next().toggleClass('menu-item-active');
            $(this).nextAll('ul').eq(0).slideToggle();
            $(this).toggleClass("lnr-chevron-up lnr-chevron-down");
        });

        $(document).on('click', '#mobile-nav-toggle', function(e) {
            $('body').toggleClass('mobile-nav-active');
            $('#mobile-nav-toggle i').toggleClass('lnr-cross lnr-menu');
            $('#mobile-body-overly').toggle();
        });

        $(document).click(function(e) {
            var container = $("#mobile-nav, #mobile-nav-toggle");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                if ($('body').hasClass('mobile-nav-active')) {
                    $('body').removeClass('mobile-nav-active');
                    $('#mobile-nav-toggle i').toggleClass('lnr-cross lnr-menu');
                    $('#mobile-body-overly').fadeOut();
                }
            }
        });
    } else if ($("#mobile-nav, #mobile-nav-toggle").length) {
        $("#mobile-nav, #mobile-nav-toggle").hide();
    }

    //------- Smooth Scroll  js --------//  

    $('.nav-menu a, #mobile-nav a, .scrollto').on('click', function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            if (target.length) {
                var top_space = 0;

                if ($('#header').length) {
                    top_space = $('#header').outerHeight();

                    if (!$('#header').hasClass('header-fixed')) {
                        top_space = top_space;
                    }
                }

                $('html, body').animate({
                    scrollTop: target.offset().top - top_space
                }, 1500, 'easeInOutExpo');

                if ($(this).parents('.nav-menu').length) {
                    $('.nav-menu .menu-active').removeClass('menu-active');
                    $(this).closest('li').addClass('menu-active');
                }

                if ($('body').hasClass('mobile-nav-active')) {
                    $('body').removeClass('mobile-nav-active');
                    $('#mobile-nav-toggle i').toggleClass('lnr-times lnr-bars');
                    $('#mobile-body-overly').fadeOut();
                }
                return false;
            }
        }
    });

    $(document).ready(function() {

        $('html, body').hide();

        if (window.location.hash) {

            setTimeout(function() {

                $('html, body').scrollTop(0).show();

                $('html, body').animate({

                    scrollTop: $(window.location.hash).offset().top - 108

                }, 1000)

            }, 0);

        } else {

            $('html, body').show();

        }

    });

    //------- Header Scroll Class  js --------//  

    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('#header').addClass('header-scrolled');
        } else {
            $('#header').removeClass('header-scrolled');
        }
    });

    //------- Owl Carusel  js --------//  


    $('.active-review-carusel').owlCarousel({
        items:2,
        margin: 30,
        dots: true,
        autoplayHoverPause: true,
        smartSpeed:650,         
        autoplay:true,      
            responsive: {
            0: {
                items: 1
            },
            480: {
                items: 1,
            },
            768: {
                items: 2,
            }
        }
    });


    //------- Timer Countdown  js --------//  

    if (document.getElementById("count")) {

        var countDownDate = new Date("Sep 5, 2018 15:37:25").getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get todays date and time
            var now = new Date().getTime();

            // Find the distance between now an the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="count"
            document.getElementById("count").innerHTML =

                "<div class='col'><span>" + days + "</span><br> Days " + "</div>" + "<div class='col'><span>" + hours + "</span><br> Hours " + "</div>" + "<div class='col'><span>" + minutes + "</span><br> Minutes " + "</div>" + "<div class='col'><span>" + seconds + "</span><br> Seconds </div>";

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("count").innerHTML = "EXPIRED";
            }
        }, 1000);

    }
    //------- Mailchimp js --------//  

    $(document).ready(function() {
        $('#mc_embed_signup').find('form').ajaxChimp();
    });

    // ------  -------- //
    $('#menu').select2({
        placeholder: "silahkan pilih menu yang tertera",
    });

    menu_list();

    $(document).on('click','#submit-pesanan',function(eve){
        eve.preventDefault()
        
        var datasend = $('#form-pesanan').serialize()
        $.ajax('http://'+host+path+'/action/tambah',{
            dataType : 'json',
            type :'POST',
            data : datasend,
            success : function(data){
                if(data.status == 'success'){
                    Swal.fire({
                        type: 'success',
                        title: 'Berhasil!!',
                        text: 'Tunggu Balasan dari kami ya',
                        footer: '<small>balasan akan dikirim jika pihak kami menyetujui perimtaan anda</small>'
                      }).then(function(){
                        location.reload();
                      })
                  }else{
                    Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Sepertinya format inputan kamu tidak benar',
                        footer: '<small>ulang lagi yaaa</small>'
                      }).then(function(){
                        location.reload();
                      })
                      console.log(data.errors)
                  }
            }
        })
        
    })
    
});

function menu_list(){
    $.getJSON('template/front/json/menu.json', function(data){
        $('#menu option').remove()
        $.each(data ,function(index,element){
            $('#menu').append(
                '<option value="'+ element.text +'">'+ element.text +' ('+ formatRupiah(element.harga) +')</option>'
            )
        })
    })
}

function formatRupiah(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    rupiah     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
  
    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }
  
    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
  }
