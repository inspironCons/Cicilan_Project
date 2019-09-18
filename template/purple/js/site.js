var path = window.location.pathname;
var host = window.location.hostname;

$(function(){
  $(window).hashchange(function(){
    var hash = $.param.fragment();
    if( (hash == 'tambah') || (hash.search('tambah')==0)){
      if(path.search('konsumen') > 0 ){
        $('.modal-title').text('Form Tambah Konsumen')
        $('#submit-konsumen').text('Tambah')
        $('#form-konsumen').attr('action','tambah')
        
      }else if(path.search('permintaan') > 0){
        $('.modal-title').text('Form Tambah Konsumen')
        $('#submit-konsumen').text('Tambah')
        $('#form-konsumen').attr('action','tambah')
         //ambil data
         var id = getUrlVars()["id"]
         var kategori_detail = getJSON('http://'+host+path+'/action/ambil',{id: id});

        //  console.log(id);
         $('#hidden-id').val(id)
         $('#nama').val(kategori_detail.data['nama'])
         $('#telpon').val(kategori_detail.data['telpon'])
         $('#pesanan').val('Pesanan = ' + JSON.parse(kategori_detail.data['pesanan'])+' || keterangan = ' +kategori_detail.data['keterangan'])
      }else if(path.search('admin/akun') > 0){
        $('.modal-title').text('Form Tambah Akun')
        $('#submit-akun').text('Tambah')
        $('#form-akun').attr('action','tambah')
      }
      $('#modal-default').modal('show')
    }else if(hash.search('ambil')==0){
      if(path.search('Konsumen')>0){
        var hal_aktif, cari = null;
        var hash = getUrlVars()

          if(hash['hal']){
            hal_aktif = hash['hal'];
          }

          ambil_konsumen(hal_aktif, true);
          $("#pagination-konsumen li a:contains('"+hal_aktif+"')").parents().addClass('active').siblings().removeClass('active');
      }else if(path.search('Laporan')>0){
        var kategori, start, end ,hal_aktif = null
        var hash = getUrlVars()
        
        if(hash['kategori'] && hash['start'] && hash['end'] && hash['hal']){
          kategori = hash['kategori']
          start = hash['start']
          end = hash['end']
          hal_aktif = hash['hal']
          $('#btn-filter').text(kategori)
        }
        
        if(hash['kategori'] && hash['hal']){
          kategori = hash['kategori']
          hal_aktif = hash['hal']
          $('#btn-filter').text(kategori)
        }
        if(hash['hal']){
          hal_aktif = hash['hal']
        }
        ambil_laporan(hal_aktif,true,start,end,kategori)

      }else if(path.search('Permintaan')>0){
        var hal_aktif, cari = null;
        var hash = getUrlVars()

          if(hash['hal']){
            hal_aktif = hash['hal'];
          }

          ambil_konsumen(hal_aktif, true);
      }else if(path.search('akun')>0){
        var hal_aktif = null;
        var hash = getUrlVars()

          if(hash['hal']){
            hal_aktif = hash['hal'];
          }

          ambil_user(hal_aktif, true);
          $("#pagination-user li a:contains('"+hal_aktif+"')").parents().addClass('active').siblings().removeClass('active');
      }
    }else if(hash.search('ubah')==0){
      if(path.search('konsumen')>0){
        $('.modal-title').text('Form Ubah Konsumen')
        $('#submit-konsumen').text('Ubah')
        $('#form-konsumen').attr('action','ubah')
        $('#row-tagihan').hide()

        //ambil data
        var cat_ID = getUrlVars()["id"]
        var kategori_detail = getJSON('http://'+host+path+'/action/ambil',{id: cat_ID});
        
        $('#hidden-id').val(kategori_detail.data['id_konsumen'])
        $('#nama').val(kategori_detail.data['nama'])
        $('#alamat').val(kategori_detail.data['alamat'])
        $('#telpon').val(kategori_detail.data['telpon'])
        $('#harga').val(formatRupiah(kategori_detail.data['harga'],'') )

      }else if(path.search('akun')>0){
        $('.modal-title').text('Form ubah Akun')
        $('#submit-akun').text('Ubah')
        $('#form-akun').attr('action','ubah')

        //ambil data
        var cat_ID = getUrlVars()["id"]
        var kategori_detail = getJSON('http://'+host+'/ci_cicilan/admin/user/action/ambil',{id: cat_ID});
        
        $('#hidden-id').val(kategori_detail.data['id_user'])        
        $('#username').val(kategori_detail.data['username'])
        $('#role').val(kategori_detail.data['role'])
      }

      $('#modal-default').modal('show')
    }else if(hash.search('hapus')==0){
      if(path.search('konsumen')>0){
        var cat_ID = getUrlVars()["id"]
        var kategori_detail = getJSON('http://'+host+path+'/action/ambil',{id: cat_ID});

        $('#hidden-id').val(kategori_detail.data['id_konsumen'])

        $('.modal-title').text('')
        $('#submit-konsumen').text('Ya Yakin!!')
        $('#form-konsumen').attr('action','hapus')
        $('form').hide();

        $('#modal-default .modal-body').prepend(
          '<p id="hapus-notif">Apakah Anda yakin akan menghapus Konsumen Bernama : <b>'+kategori_detail.data['nama']+'</b> ???</p>'
        )
      $('#modal-default').modal('show')          
      }else if(path.search('akun')>0){
          var id = getUrlVars()["id"]
          swal({
            title: 'Are you sure?',
            text: "It will be deleted permanently!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            showLoaderOnConfirm: true,
            allowOutsideClick: false,          
            preConfirm: function() {
              return new Promise(function(resolve) {             
                $.ajax({
                  url: 'http://'+host+'/ci_cicilan/admin/user/action/hapus',
                  type: 'POST',
                    data: {id:id},
                    dataType: 'json'
                })
                .done(function(response){
                  swal('Deleted!', response.message, response.status);
                  ambil_user()
                readProducts();
                })
                .fail(function(){
                  swal('Oops...', 'Something went wrong with ajax !', 'error');
                })
              });
            }
          }).then(function (result) {
            if (result.dismiss === 'cancel') {
                location.href = "akun"
            }
        })	
      }

    }else if(hash.search('detail')==0){
      if(path.search('konsumen')>0){
        $('.modal-title').text('Detail Cicilan')


        ambil_detail()
       
      }

      $('#modal-bayar').modal('show')
    }
    
  })
  $(window).trigger('hashchange');

  $('#modal-default').on('hide.bs.modal', function(){ //untuk mereset seluruh form crud menjadi semula
    window.history.pushState(null,null,path)
    $('#row-tagihan').show()
    $('form').show();
    $('#hidden-id').val('')
    $('#hapus-notif').remove()
    
    $('#nama').val('').attr('placeholder','')
    $('#alamat').val('').attr('placeholder','')
    $('#telpon').val('').attr('placeholder','')
    $('#harga').val('').attr('placeholder','')
    $('#jumlah').val('').attr('placeholder','')
    $('#jatuhTempo').val('').attr('placeholder','')
    $('#username').val('').attr('placeholder','')
    $('#role').val('').attr('placeholder','')
    // $(this).find('form').trigger('reset');
  })

  $('#modal-bayar').on('hide.bs.modal', function(){ //untuk mereset seluruh form crud menjadi semula
    window.history.pushState(null,null,path)
  })

  $(document).on('click','button#submit-akun',function(eve){
    eve.preventDefault();
    var action    = $('#form-akun').attr('action')
    var datasend  = $('#form-akun').serialize()

    $.ajax('http://'+host+'/ci_cicilan/admin/user/action/'+ action,{
      dataType : 'json',
      type :'POST',
      data : datasend,
      success : function(data){
        if(data.status == 'success'){
          Swal.fire({
            type: 'success',
            title: 'Berhasil!!',
          })
          ambil_user()
          $('#modal-default').modal('hide')
        }else{
          Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'sepertinya ada kesalahan',
            footer: '<small>ulang lagi yaaa</small>'
          })
          $('#modal-default').modal('hide')
        }
      }
    })
  })

  $('input#passwordbase, input#password').on('keyup', function () {
      
    if ($('input#password').val() == $('input#passwordbase').val() ) {
      $('#message').html('<i class="mdi mdi-check-circle"></i>').css('color', 'blue')
    }else
      $('#message').html('Password Tidak Cocok').css('color', 'red')
  });

  ambil_permintaan(null,false)
  ambil_laporan(null,false,null,null,null)
  filter()
  ambil_konsumen()
  ambil_user()
  if(path.search('Konsumen')){
    keyrupiah()
  }

  $(document).on('click','#submit-konsumen',function(eve){
    eve.preventDefault()

    var action    = $('#form-konsumen').attr('action')
    var datasend  = $('#form-konsumen').serialize()

    $.ajax('http://'+host+path+'/action/'+ action,{
      dataType : 'json',
      type :'POST',
      data : datasend,
      success : function(data){
        if(data.status == 'success'){
          ambil_konsumen(null,false);
          $('#modal-default').modal('hide')

          $('#body').prepend(
            '<div class="control-group"><div id="msg" class="alert alert-success alert-dismissible">'+
            '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
            '<h4><i class="icon fa fa-check"></i> Selamat!</h4>Data Berhasil Diperbaharui</div></div>'
              );
          $('#body').click(function(){
            $('#msg').fadeOut();
          });
        }else{
          $.each(data.errors, function(key, value){
            $('#'+key).attr('placeholder',value);
          })
        }
      }
    })
  })
  
  $(document).on('click','#submit-permintaan',function(eve){
    eve.preventDefault()
    // var action    = $('#form-konsumen').attr('action')
    var datasend  = $('#form-konsumen').serialize()
    // console.log(url);
    $.ajax('http://localhost/ci_cicilan/admin/konsumen/action/tambah',{
      dataType : 'json',
      type :'POST',
      data : datasend,
      success : function(data){
        if(data.status == 'success'){
          terimaPermintaan()
          $('#modal-default').modal('hide');
          ambil_permintaan();
        }else{
          Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Sepertinya format inputan kamu tidak benar',
            footer: '<small>ulang lagi yaaa</small>'
          })
          $('#modal-default').modal('hide')
        }
      }
    })
  }) 

 

  if(getUrlVars()["hal"]){ 
    ambil_konsumen(getUrlVars()["hal"],false); 
    ambil_laporan(getUrlVars()["hal"],false); 
  }
  else{ 
    ambil_konsumen(null,false);
    ambil_laporan(null,false)
  } 
  if(getUrlVars()["no"]){ 
    $('html').printThis({
      
    })
  }
  $('#jatuhTempo').datepicker({
      language: "id",
      forceParse : false,
      autoclose : true,
      format: 'yyyy-mm-dd',
      startDate: 'now'
  }).on('hide', function(e) {
    e.stopPropagation();
  })
  
})

function ambil_konsumen(hal_aktif,scrolltop,cari){
  var no = 1
  if($('#table-konsumen').length > 0){
    $.ajax('http://'+host+path+'/action/ambil',{
      dataType : 'json',
      type:'post',
      data:{hal_aktif:hal_aktif,cari:cari},
      success : function(data){
        // alert('success')        
        $('#table-konsumen tbody tr').remove()
        $.each(data.record,function(index,element){
          $('#table-konsumen').find('tbody').append(
            '<tr>'+
              '<td width="5%" align="center" scope="col">'+ no++ +'</td>'+
              '<td width="20%" scope="col">'+element.nama+'</td>'+
              '<td width="15%"align="center" scope="col">'+element.telpon+'</td>'+
              '<td width="30%" scope="col">'+
                '<a class="float-right btn btn-outline-info  ml-5" href="konsumen#detail?id='+ element.id_konsumen +'">Detail</a>'+
                '<a class="float-right btn btn-outline-secondary ml-5 btn-ubah"  href="konsumen#ubah?id='+ element.id_konsumen +'">Ubah</a>'+
                '<a class="float-right btn btn-outline-danger" href="konsumen#hapus?id='+ element.id_konsumen +'">Hapus</a>'+
              '</td>'+
            '</tr>'
          )
        })

        /* BAGIAN UNTUK PAGINATION DILETAKKAN DISINI */
        var pagination = '';
        var paging = Math.ceil(data.total_rows / data.perpage);
        
        if( (!hal_aktif) && ($('#pagination-konsumen li').length == 0)){
          $('#pagination-konsumen li').remove();
          for(i = 1; i <= paging ; i++){
            pagination = pagination + '<li><a href="Konsumen#ambil?hal='+i+'">'+i+'</a></li>';
          }
        }
        else if(hal_aktif && cari){
            $('#pagination-konsumen li').remove();
            for(i = 1; i <= paging ; i++){
            pagination = pagination + '<li><a href="Konsumen#ambil?cari='+cari+'hal='+i+'">'+i+'</a></li>';
          }
        }

        else if(hal_aktif){
          $('ul#pagination-konsumen li').remove();
          for (i = 1; i <= paging; i++) {
            pagination = pagination + '<li><a href="Konsumen#ambil?&hal='+i+'">'+i+'</a></li>';
          }               
        }


        $('#pagination-konsumen').append(pagination);
        $("#pagination-konsumen li:contains('"+hal_aktif+"')").addClass('active');

        if(scrolltop == true) {
          $('body').scrollTop(0);
        }
      }
      
    })
  }
}

function ambil_detail(){
  //ambil detail untuk data konsumen
   var idBayar = getUrlVars()['id']
   var detailKonsumen = getJSON('http://'+host+path+'/action/ambil',{id: idBayar});
  
  $('#detailNama').val(detailKonsumen.data['nama'])
  $('#detailAlamat').val(detailKonsumen.data['alamat'])
  $('#detailTelepon').val(detailKonsumen.data['telpon'])
  $('#detailTotalBiaya').val('Rp. '+ formatRupiah(detailKonsumen.data['harga']))

  //ambil detail untuk tabel cicilan
  var no = 1
  var button =''
  var tanggal
  if($('#detail-tagihan').length > 0){
    var table = document.getElementById('detail-tagihan');
    $.ajax('http://'+host+path+'/action/detail',{
      dataType : 'json',
      type:'post',
      data :{id:idBayar},
      success : function(data){
        // alert('success')        
        $('#detail-tagihan tbody tr').remove()
        moment.locale('id')
        $.each(data.data,function(index,element){
          if(element.noFaktur == ''){
            button = '<button type="button" id="btn-bayar" class="btn btn-outline-primary" onclick="bayar('+ element.id_tagihan +')">Bayar</button>'
          }else{
            button = '<a class="btn btn-outline-success" target="_blank" href="Konsumen/invoice?no='+ element.id_tagihan +'&id='+ element.id_konsumen +'" role="button">Cetak Invoice</a>'
          }

          if(element.tanggalBayar === null){
            tanggal = ''
          }else{
            tanggal = element.tanggalBayar
          }
          
          $('.modal-body #detail-tagihan').find('tbody').append(
            '<tr align="center">'+
              '<th width="5%" scope="col">'+ no++ +'</th>'+
              '<th scope="col">'+ moment(element.jatuhTempo).format('LL') +'</th>'+
              '<th scope="col">'+ element.noFaktur +'</th>'+
              '<th scope="col" class="tanggalBayar">'+ moment(tanggal).format('LL')+'</th>'+
              '<th scope="col">Rp. '+ formatRupiah(element.jumlah) +' </th>'+
              '<th width="15%">'+ button +
              '</th>'+
           '</tr>'
          )
          
          //untuk menghalau nilai 'Invalid date' yang di buat oleh moment js dikarenakan nilai dari database adalah kosong(null)
          $('th.tanggalBayar').text(function (i, oldText){
              return oldText.replace('Invalid date', '-');
          });
            
          
        })
      }
    })
  }
}

function ambil_laporan(hal_aktif,scrolltop,start,end,kategori){
  moment.locale('id')
  if($('#tbl-laporan').length >0){
    $.ajax('http://'+host+path+'/action/ambil',{
      dataType : 'json',
      type:'post',
      data:{hal_aktif:hal_aktif,start:start,end:end,kategori:kategori},
      success : function(data){
        // alert('success')
        $('#tbl-laporan tbody tr').remove()
        $.each(data.data,function(index,element){
          $('#tbl-laporan').find('tbody').append(
           ' <tr>'+
            '<th>'+ moment(element.JatuhTempo).format('LL') +'</th>'+
            '<td>'+ element.nama +'</td>'+
            '<td>Rp. '+ formatRupiah(element.harga) +'</td>'+
            '</tr>'
          )
        })

        /* BAGIAN UNTUK PAGINATION DILETAKKAN DISINI */
        var pagination = '';
        var paging = Math.ceil(data.total_rows / data.perpage);
        
        if( (!hal_aktif) && ($('#pagination-laporan li').length == 0)){
          $('#pagination-laporan li').remove();
          for(i = 1; i <= paging ; i++){
            pagination = pagination + '<li><a href="Laporan#ambil?hal='+i+'">'+i+'</a></li>';
          }
        }else if(hal_aktif && kategori){
            $('#pagination-laporan li').remove();
            for(i = 1; i <= paging ; i++){
            pagination = pagination + '<li><a href="Laporan#ambil?kategori='+ kategori +'&hal='+i+'">'+i+'</a></li>';
          }
        }
        else if(hal_aktif && start && end && kategori){
            $('#pagination-laporan li').remove();
            for(i = 1; i <= paging ; i++){
            pagination = pagination + '<li><a href="Laporan#ambil?kategori='+ kategori +'&start='+start+'&end='+end+'&hal='+i+'">'+i+'</a></li>';
          }
        }

        else if(hal_aktif){
          $('ul#pagination-laporan li').remove();
          for (i = 1; i <= paging; i++) {
            pagination = pagination + '<li><a href="Laporan#ambil?&hal='+i+'">'+i+'</a></li>';
          }               
        }
        $('#pagination-laporan').append(pagination);
        $("#pagination-laporan li:contains('"+hal_aktif+"')").addClass('active');
        if(scrolltop == true) {
          $('body').scrollTop(0);
        }
      }
      
    })
  }
}

function ambil_permintaan(hal_aktif,scrolltop,cari){
  if($('table#tbl-permintaan').length > 0){
    $.ajax('http://'+host+path+'/action/ambil',{
      dataType : 'json',
      type:'post',
      data:{hal_aktif:hal_aktif,cari:cari},
      success : function(data){
        // alert('success')        
        $('#tbl-permintaan tbody tr').remove()
        $.each(data.record,function(index,element){
          $('#tbl-permintaan').find('tbody').append(
            '<tr>'+
              '<td>'+ element.nama +'</td>'+
              '<td>'+ element.telpon +'</td>'+
              '<td>'+ JSON.parse(element.pesanan) +'</td>'+
              '<td>'+ element.keterangan +'</td>'+
              '<td><a class="float-right btn btn-outline-success  ml-5" href="permintaan#tambah?id='+ element.id_request +'">Terima</a>'+
            '</tr>'
          )
        })
        
        /* BAGIAN UNTUK PAGINATION DILETAKKAN DISINI */
        var pagination = '';
        var paging = Math.ceil(data.total_rows / data.perpage);
        
        if( (!hal_aktif) && ($('#pagination-permintaan li').length == 0)){
          $('#pagination-permintaan li').remove();
          for(i = 1; i <= paging ; i++){
            pagination = pagination + '<li><a href="permintaan#ambil?hal='+i+'">'+i+'</a></li>';
          }
        }
        else if(hal_aktif && cari){
            $('#pagination-permintaan li').remove();
            for(i = 1; i <= paging ; i++){
            pagination = pagination + '<li><a href="permintaan#ambil?cari='+cari+'hal='+i+'">'+i+'</a></li>';
          }
        }

        else if(hal_aktif){
          $('ul#pagination-permintaan li').remove();
          for (i = 1; i <= paging; i++) {
            pagination = pagination + '<li><a href="permintaan#ambil?&hal='+i+'">'+i+'</a></li>';
          }               
        }


        $('#pagination-permintaan').append(pagination);
        $("#pagination-permintaan li:contains('"+hal_aktif+"')").addClass('active');

        if(scrolltop == true) {
          $('body').scrollTop(0);
        }
      }
      
    })
  }
}

function ambil_user(hal_aktif,scrolltop){

  moment.locale('id')
  if($('table#tbl-user').length > 0){
    $.ajax('http://'+host+path.replace('admin/akun','admin/user')+'/action/ambil',{
      dataType : 'json',
      type:'post',
      data:{hal_aktif:hal_aktif},
      success : function(data){
        // alert('success')        
        $('#tbl-user tbody tr').remove()
        $.each(data.record,function(index,element){
          $('#tbl-user').find('tbody').append(
            '<tr>'+
              '<td>'+ element.username +'</td>'+
              '<td>'+ element.role +'</td>'+
              '<td>'+ moment(element.terakhirMasuk).format('LLL') +'</td>'+
              '<td>'+ element.aktif +'</td>'+
              '<td><a class="btn btn-outline-primary ml-5 btn-ubah" href="#ubah?id='+element.id_user+'">Ubah</a>'+
              '<a class="btn btn-outline-danger ml-5 btn-ubah" href="#hapus?id='+element.id_user+'">Hapus</a>'+
            '</tr>'
          )
        })
        
        /* BAGIAN UNTUK PAGINATION DILETAKKAN DISINI */
        var pagination = '';
        var paging = Math.ceil(data.total_rows / data.perpage);
        
        if( (!hal_aktif) && ($('#pagination-user li').length == 0)){
          $('#pagination-user li').remove();
          for(i = 1; i <= paging ; i++){
            pagination = pagination + '<li><a href="akun#ambil?hal='+i+'">'+i+'</a></li>';
          }
        }
        else if(hal_aktif){
          $('ul#pagination-user li').remove();
          for (i = 1; i <= paging; i++) {
            pagination = pagination + '<li><a href="akun#ambil?&hal='+i+'">'+i+'</a></li>';
          }               
        }


        $('#pagination-user').append(pagination);
        $("#pagination-user li:contains('"+hal_aktif+"')").addClass('active');

        if(scrolltop == true) {
          $('body').scrollTop(0);
        }
      }
      
    })
  }
}

function bayar(id){
  $.ajax({
      type: 'POST',
      url: 'http://'+host+path+'/action/bayar',
      data: {id : id},
      success: function() {
          // console.log(data)
          ambil_detail()
      }
  });
}

function terimaPermintaan(){
    var id = getUrlVars()['id']
    $.ajax({
      type: 'POST',
      url: 'http://'+host+path+'/action/ubah',
      data: {id : id},
      success: function() {
          Swal.fire({
            type: 'success',
            title: 'Berhasil!!',
            text: 'Silahkan lihat pada menu konsumen'
          })
      }
  });
}

function getUrlVars(){
  var vars=[],hash;
  var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');

  for (var i =0; i <hashes.length; i++)
  {
      hash = hashes[i].split('=');
      vars.push(hash[0]);
      vars[hash[0]] = hash [1];
  }
  return vars
}


function getJSON(url,data){
  return JSON.parse($.ajax({
    type: 'POST',
    url : url,
    data: data,
    dataType:'json',
    global: false,
    async: false,
    success:function(msg){

    }
  }).responseText);
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

function filter(){
    moment.locale('id')

    $('#reportrange').daterangepicker({
          startDate: moment().subtract('days', 29),
          endDate: moment(),
          showDropdowns: true,
          showWeekNumbers: true,
          timePicker: false,
          timePickerIncrement: 1,
          timePicker12Hour: true,
          ranges: {
              'Bulan ini': [moment().startOf('month'), moment().endOf('month')],
              'Bulan lalu': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
          },
          opens: 'left',
          buttonClasses: ['btn btn-default'],
          applyClass: 'btn-small btn-primary',
          cancelClass: 'btn-small',
          separator: ' to ',

        },
        function(start, end) {
        console.log("Callback has been called!");
        $('#reportrange span').html(start.format('D MMMM YYYY') + ' - ' + end.format('D MMMM YYYY'));
        startDate = moment(start).format("X")
        endDate = moment(end).format('X')

        }
    );
    //Set the initial state of the picker label
    $('#reportrange span').html(moment().subtract('days', 29).format('D MMMM YYYY') + ' - ' + moment().format('D MMMM YYYY'));

    $('#saveBtn').click(function(){
      var start = startDate
      var end   = endDate
      var kategori = $('#btn-filter').text()
      window.location.hash = "#ambil?kategori="+ kategori +"&start="+start+"&end="+end+"&hal=1";
    });

}

function keyrupiah(){
  var rupiah = document.getElementById('jumlah');
  var harga = document.getElementById('harga');
	rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
	rupiah.value = formatRupiah(this.value, '');
	});
	harga.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			harga.value = formatRupiah(this.value, '');
	});
}


function printLaporan(){
  $('#tbl-laporan').printThis({
  });
}

function foo(id) {
  swal({
    title: "Are you sure?",
    text: "You will not be able to recover this imaginary file!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Yes, delete it!",
    closeOnConfirm: false
  },
  function(isConfirm){
    alert(isConfirm);
    alert(id);
    swal("Deleted!", "Your imaginary file has been deleted.", "success");
  }); 
} 