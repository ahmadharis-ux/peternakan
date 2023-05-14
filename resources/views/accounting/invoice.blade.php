<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
    <h5>Invoice</h5>
        <table style="border: none">
                <tr>
                    <th style="width: 100mm">
                    </th>
                    <td>
                        <h5><b>{{auth()->user()->name}} ({{auth()->user()->role->name}})</b></h5>
                        <br>
                        <br>
                        <p>Jalan Maribaya Timur RT01 RW14 Desa
                            Cibodas Kecamatan Lembang
                            Kabupaten Bandung Barat, 40391, Jawa
                            Barat, Indonesia</p>
                        <br>
                        <b>{{auth()->user()->email}}</b>
                    </td>
                </tr>
        </table>
        <hr>
        <table>
            <tr>
               <td style="width: 100mm;">
                   Tagihan Kepada <br> <b>{{$data->user->name}}</b>
               </td>
               <td style="width: 50mm ">
                Nomor Faktur :
               </td> 
               <td>
                DivasCow - {{$data->id}}
               </td>
            </tr>
            <tr>
               <td style="">
                  
               </td>
               <td style="">
                Jumlah Pesanan Sapi :
               </td> 
               <td>
                {{$data->piutang->count()}} Ekor
               </td>
            </tr>
            <tr>
               <td style="">
                  <b>{{$data->user->email}}</b>
               </td>
               <td style="">
                Tanggal Faktur :
               </td> 
               <td>
                {{date('d-F-Y',strtotime($data->tanggal))}}
               </td>
            </tr>
        </table>
        <br>
        <table>
            <tr style="background-color: rgb(180, 34, 146);height:80px">
                <td>Sapi</td>
                <td>Harga</td>
                <td>Jumlah</td>
            </tr>
            <?php 
              $piutang = 0;
            ?>
            @foreach ($data->piutang as $item)    
            <tr style="background-color: rgb(168, 159, 166);height:80px">
                <td style="width:100mm">
                  <label for="">{{$item->hutang->eartag}}</label>
                  <p style="font-size: 11px">{{$item->bobot}} * {{number_format($item->harga_kg)}}</p>
                </td>
                <td style="width:50mm">Rp. {{number_format($item->total_harga)}}</td>
                <td>Rp. {{number_format($item->total_harga)}}</td>
            </tr>
            <?php 
              $piutang += $item->total_harga
            ?>
            @endforeach
            <tr>
              <td rowspan="3" style="width:100mm">Subtotal</td>
              <td></td>
              <td>Rp. {{number_format($piutang)}}</td>
            </tr>
        </table>
        <br>
        <table>
            <tr style="background-color: rgb(180, 34, 146);height:80px">
                <td>Keterangan Operasional</td>
                <td>Nominal</td>
            </tr>
            <?php 
            $opr = 0
            ?>
            @foreach ($data->operasional as $item)    
            <tr style="background-color: rgb(168, 159, 166);height:80px">
                <td style="width:100mm">
                  {{$item->keterangan}}
                </td>
                <td style="width:50mm">Rp. {{number_format($item->nominal)}}</td>
            </tr>
            <?php 
            $opr += $item->nominal
            ?>
            @endforeach
            <tr>
              <td rowspan="2" style="">Subtotal</td>
              <td>Rp. {{number_format($opr)}}</td>
            </tr>
        </table>
        <br>
        <p>Riwayat Pembayaran</p>
        <table>
          <tr style="background-color: rgb(180, 34, 146);height:80px">
              <td>Tanggal Pembayaran</td>
              <td>Nominal</td>
              <td >Keterangan</td>
          </tr>
          <?php 
            $debit = 0
          ?>
          @foreach ($data->pembayaran as $item)    
          <tr style="background-color: rgb(168, 159, 166);height:80px">
              <td style="width:100mm">
                {{date('d-m-Y',strtotime($item->tanggal))}}
              </td>
              <td style="width:50mm">Rp. {{number_format($item->debit)}}</td>
              <td style="width:30mm">{{$item->ket}}</td>
          </tr>
          <?php 
          $debit += $item->debit
          ?>
          @endforeach
          <tr>
            <td rowspan="3" style="">Subtotal</td>
            <td>Rp. {{number_format($debit)}}</td>
          </tr>
        </table>

        <br>
        <hr>
        <table>
          <tr>
            <td style="width:80mm">Total  </td>
            <td style="width: 10mm">:</td>
            <td>{{number_format($piutang+$opr)}} </td>
          </tr>
          <tr>
            <td>Tunai  </td>
            <td>:</td>
            <td>{{number_format($debit)}} </td>
          </tr>
          <tr>
            <td>Sisa Pembayaran  </td>
            <td>:</td>
            <td>{{number_format($piutang+$opr-$debit)}} </td>
          </tr>
        </table>
        <br>
        @if ($opr+$piutang == $debit)
        <label for="">LUNAS</label>
        @else
        <label for="">BELUM LUNAS</label>
        @endif
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  </body>
</html>