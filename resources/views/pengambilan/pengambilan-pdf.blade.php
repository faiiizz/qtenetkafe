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

<h1><center>Laporan Pengambilan</center></h1>

<table id="customers">
  <tr>
    <th>No</th>
    <th>ID barang</th>
    <th>Jumlah</th>
    <th>Tanggal</th>
    <th>Keterangan</th>
 </tr>
 @php
 $no=1;
@endphp
@foreach($pengambilans as $ambil)
<tr>
<td>{{$no++}}</td>
<td>{{ $ambil->inventory_id }}</td>
<td>{{ $ambil->jumlah }}</td>
<td>{{ $ambil->tanggal }}</td>
<td>{{ $ambil->keterangan }}</td>
</tr>
@endforeach
</table>

</body>
</html>



