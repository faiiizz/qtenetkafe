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
    <th>Pengeluaran</th>
    <th>Tanggal</th>
    <th>Inventory_id</th>
    <th>Jumlah</th>
    <th>Rincian</th>
 </tr>
 @php
 $no=1;
@endphp
@foreach($pengeluarans as $luar)
<tr>
<td>{{$no++}}</td>
<td>{{ $luar->pengeluaran }}</td>
<td>{{ $luar->tanggal }}</td>
<td>{{ $luar->inventory_id }}</td>
<td>{{ $luar->jumlah }}</td>
<td>{{ $luar->rincian }}</td>
</tr>
@endforeach
</table>

</body>
</html>



