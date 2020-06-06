<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Tables <small>Data Booking Tiket</small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row" style="display: block;">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Table Data Booking</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p>

                    <div class="table-responsive">
                    <br>
                    <a href="#form" data-toggle="modal" class="btn btn-primary" onclick="submit('tambah')">Tambah Data</a>
                    <br>
                      <table class="table table-striped jambo_table bulk_action">
                        <thead class="bg-primary">
                          <tr class="headings">
                            <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th>
                            <th class="column-title">Id</th>
                            <th class="column-title">Kode Booking Tiket</th>
                            <th class="column-title">Nama</th>
                            <th class="column-title">Jumlah Tiket</th>
                            <th class="column-title">Tanggal Pembookingan</th>
                            <th class="column-title">Waktu Pembookingan</th>
                            <th class="column-title">Jumlah Tarif</th>
                            <th class="column-title">Aksi</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                           </tr>
                        </thead>
                        <tbody id="tabel_booking"></tbody>
                      </table>

                      <div class="modal fade" id="form" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">

                          <div class="modal-header">
                            <h1>Data Booking Tiket</h1>
                          </div>

                          <center><font color="red"><p id="pesan"></p></font></center>

                          <table class="table">
                             <!-- <tr>
                              <td>ID_BOOKING</td>
                              <td><input type="text" name="id" placeholder="Id Booking" class="form-control"/></td>
                            </tr> -->
                            <tr>
                              <td>KODE BOOKING</td>
                              <td><input type="text" name="kode_booking" placeholder="Kode Booking" class="form-control"/>
                                <input type="hidden" name="id" value=""></td>
                            </tr>
                            <tr>
                              <td>NAMA</td>
                              <td><input type="text" name="nama_booking" placeholder="Nama Booking" class="form-control"/></td>
                            </tr>
                            <tr>
                              <td>JUMLAH TIKET</td>
                              <td><input type="text" name="jumlah_booking" placeholder="Jumlah Booking" class="form-control"/></td>
                            </tr>
                            <tr>
                              <td>TANGGAL BOOKING</td>
                              <td><input type="text" name="tanggal_booking" placeholder="Tanggal Booking" class="form-control"/></td>
                            </tr>
                            <tr>
                              <td>WAKTU BOOKING</td>
                              <td><input type="text" name="waktu_booking" placeholder="Waktu Booking" class="form-control"/></td>
                            </tr>
                            <tr>
                              <td>JUMLAH TARIF</td>
                              <td><input type="text" name="tarif_booking" placeholder="Tarif Booking" class="form-control"/></td>
                            </tr>
                            <tr>
                              <td>
                              <button type="button" id="btn-tambah" onClick="tambahdata()" class="btn btn-primary">Tambah</button>
                               <button type="button" id="btn-ubah" onClick="ubahdata()" class="btn btn-primary">Ubah</button> 
                              <button type="button" data-dismiss="modal" class="btn btn-primary">Batal</button>
                              </td>
                            </tr>
                          </table>
                    </div>	
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

        <script type="text/javascript">

          ambilData();

          function ambilData(){
            $.ajax({
              type:'GET',
              url:'<?php echo base_url()."index.php/booking/ambildata" ?>',
              dataType: 'json',
              success: function(data){
                console.log(data[0]);
                var baris='';
                for(var i=0;i<data.length;i++){
                  baris += '<tr>'+
                                `<td>
                                    
                                </td>` +
                                '<td>'+ (i+1) +' </td>' +
                                '<td>'+ data[i].kode_booking +' </td>' +
                                '<td>'+ data[i].nama_booking +' </td>' +
                                '<td>'+ data[i].jumlah_booking +' </td>' +
                                '<td>'+ data[i].tanggal_booking +' </td>' + 
                                '<td>'+ data[i].waktu_booking +' </td>' +
                                '<td>'+ data[i].tarif_booking +' </td>' +
                                '<td><a href="#form" data-toggle="modal" class="btn btn-primary" onclick="submit('+data[i].id+')">Ubah</a> <a onclick="hapusdata('+data[i].id+')" class="btn btn-primary" >Hapus</a></td>'+
                            '</tr>';
                }

                $('#tabel_booking').append(baris);
                // location.reload();

              }
            });
          }
        
        function tambahdata(){

          var kode_booking=$("[name='kode_booking']").val();          
          var nama_booking=$("[name='nama_booking']").val();
          var jumlah_booking=$("[name='jumlah_booking']").val();
          var tanggal_booking=$("[name='tanggal_booking']").val();
          var waktu_booking=$("[name='waktu_booking']").val();
          var tarif_booking=$("[name='tarif_booking']").val();

          $.ajax({
            type:'POST',
            data: 'kode_booking='+kode_booking+'&nama_booking='+nama_booking+'&jumlah_booking='+jumlah_booking+'&tanggal_booking='+tanggal_booking+'&waktu_booking='+waktu_booking+'&tarif_booking='+tarif_booking,
            url: '<?php echo base_url() . 'index.php/booking/tambahdata' ?>', 
            dataType: 'application/json',
            success: function(hasil){
              console.log("Berhasil");
              $("#pesan").html(hasil.pesan); 
              location.reload();

            }
          });
          console.log("Berhasil");
          location.reload();
        }

        function submit(x){ 
          if(x=='tambah'){ 
            $('#btn-tambah').show();
            $('#btn-ubah').hide();
          }else{
            $('#btn-tambah').hide();
            $('#btn-ubah').show();  

            $.ajax({
              type: "POST",
              data: 'id='+x,
              url:'<?php echo base_url()."index.php/booking/ambilId" ?>',
              dataType: 'json',
              success: function(hasil){
                // console.log(hasil);
                 $('[name="id"]').val(hasil[0].id);
                $('[name="kode_booking"]').val(hasil[0].kode_booking);
                $('[name="nama_booking"]').val(hasil[0].nama_booking);
                $('[name="jumlah_booking"]').val(hasil[0].jumlah_booking);
                $('[name="tanggal_booking"]').val(hasil[0].tanggal_booking);
                $('[name="waktu_booking"]').val(hasil[0].waktu_booking);
                $('[name="tarif_booking"]').val(hasil[0].tarif_booking);
              } 
            });
          }
        }

        function ubahdata(){
           var id=$("[name='id']").val();
           var kode_booking=$("[name='kode_booking']").val();      
           var nama_booking=$("[name='nama_booking']").val();
           var jumlah_booking=$("[name='jumlah_booking']").val();
           var tanggal_booking=$("[name='tanggal_booking']").val();
           var waktu_booking=$("[name='waktu_booking']").val();
           var tarif_booking=$("[name='tarif_booking']").val();

           $.ajax({
            type: 'POST',
            data: 'id='+id+'&kode_booking='+kode_booking+'&nama_booking='+nama_booking+'&jumlah_booking='+jumlah_booking+'&tanggal_booking='+tanggal_booking+'&waktu_booking='+waktu_booking+'&tarif_booking='+tarif_booking,
            url: '<?php echo base_url(). 'index.php/booking/ubahdata' ?>',
            dataType: 'json',
            success: function(hasil){
              $("#pesan").html(hasil.pesan);

              if(hasil.pesan==''){
                $("#form").modal('hide');
                // ambilData();
                location.reload();
              }

            }
           })

        }

        function hapusdata(id){
          var tanya= confirm('Apakah anda yakin akan menghapus data?');

       if(tanya){
        $.ajax({
         type: 'POST',
         data: 'id='+id,
         url: '<?php echo base_url()."index.php/booking/hapusdata" ?>',
           success: function(){
            // ambilData();

            location.reload();

              }
            })
          }
        }
        </script>