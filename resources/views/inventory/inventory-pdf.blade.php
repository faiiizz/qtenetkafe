{{-- <h1><center></center></h1>
<table border="1" cellspacing="0" cellpadding="5">
  <tr>
    <th>No</th>
    <th>Kode Barang</th>
    <th>Nama Barang</th>
    <th>Stok</th>
    <th>Harga</th>
    <th>Satuan</th>
  </tr>
  @php
      $no=1;
  @endphp
  @foreach($inventories as $inv)
  <tr>
    <td>{{$no++}}</td>
    <td>{{$inv->kd_barang}}</td>
    <td>{{$inv->nama_barang}}</td>
    <td>{{$inv->stok}}</td>
    <td>{{$inv->harga}}</td>
    <td>{{$inv->satuan}}</td>
  </tr>
  @endforeach
</table> --}}
<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}
#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #dddddde3;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #0e61dd;
  color: white;
}
</style>
</head>
<body>

<h1><center>Laporan Data Inventory</center></h1>

<table id="customers">
  <tr>
    <th>No</th>
    <th>Kode Barang</th>
    <th>Nama Barang</th>
    <th>Stok</th>
    <th>Harga</th>
    <th>Satuan</th>
 </tr>
 @php
 $no=1;
@endphp
@foreach($inventories as $inv)
<tr>
<td>{{$no++}}</td>
<td>{{$inv->kd_barang}}</td>
<td>{{$inv->nama_barang}}</td>
<td>{{$inv->stok}}</td>
<td>{{$inv->harga}}</td>
<td>{{$inv->satuan}}</td>
</tr>
@endforeach
</table>

</body>
</html>



