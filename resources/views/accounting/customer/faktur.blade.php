<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
        <h3>Invoice</h3>
        {{$data->id}}
        {{-- <table style="border: none">
                <tr>
                    <th style="width: 50%"></th>
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
               <td style="width: 50%">
                   Tagihan Kepada <br> <b>{{$data->user->name}}</b>
               </td>
               <td style="width:15%">
                Nomor Faktur :
               </td> 
               <td>
                DivasCow - {{$data->id}}
               </td>
            </tr>
            <tr>
               <td style="width:50%">
                  
               </td>
               <td style="width:15%">
                Jumlah Pesanan Sapi :
               </td> 
               <td>
                {{$data->hutang->count()}}
               </td>
            </tr>
            <tr>
               <td style="width:50%">
                  <b>{{$data->user->email}}</b>
               </td>
               <td style="width:15%">
                Tanggal Faktur :
               </td> 
               <td>
                {{date('d-F-Y',strtotime($data->tanggal))}}
               </td>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <td>Sapi</td>
            </tr>
        </table> --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>    
</body>
</html>