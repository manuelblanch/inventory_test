<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
      table {
        border-collapse: collapse;
        width: 100%;
      }
      td, th {
        border: solid 2px;
        padding: 10px 5px;
      }
      tr {
        text-align: center;
      }
      .container {
        width: 100%;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <div class="container">
        <div><h2>Llista de inventari desde {{$searchingVals['from']}} a {{$searchingVals['to']}}</h2></div>
       <table id="example2" role="grid">
            <thead>
              <tr role="row">
                <th width="20%">Name</th>
                <th width="20%">Descripció</th>
                <th width="20%">Tipus de Material</th>
                <th width="20%">Marca</th>
                <th width="20%">Model</th>
                <th width="20%">Localització</th>
                <th width="20%">Quantitat</th>
                <th width="20%">Preu</th>
                <th width="20%">Procedencia Monetaria</th>
                <th width="20%">Proveidor</th>
                <th width="20%">Data Entrada</th>
                <th width="20%">Ultima Actualització</th>

              </tr>
            </thead>
            <tbody>
            @foreach ($inventories as $inventory)
                <tr role="row" class="odd">
                  <td>{{ $inventory['name'] }}</td>
                  <td>{{ $inventory['description'] }}</td>
                  <td>{{ $inventory['material_type_name'] }}</td>
                  <td>{{ $inventory['brand_name'] }}</td>
                  <td>{{ $inventory['brand_model_name'] }}</td>
                  <td>{{ $inventory['location_name'] }}</td>
                  <td>{{ $inventory['quantity'] }}</td>
                  <td>{{ $inventory['price'] }}</td>
                  <td>{{ $inventory['moneySource_name'] }}</td>
                  <td>{{ $inventory['provider_name'] }}</td>
                  <td>{{ $inventory['date_entrance'] }}</td>
                  <td>{{ $inventory['last_update'] }}</td>
              </tr>
            @endforeach
            </tbody>
          </table>
    </div>
  </body>
</html>
