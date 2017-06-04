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
        <div><h2>Llista from {{$searchingVals['from']}} to {{$searchingVals['to']}}</h2></div>
       <table id="example2" role="grid">
            <thead>
              <tr role="row">
                <th width="20%">Name</th>
                <th width="20%">Descripció</th>
                <th width="20%">Tipus de Material</th>
                <th width="20%">Marca</th>
                <th width="20%">Model</th>

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
              </tr>
            @endforeach
            </tbody>
          </table>
    </div>
  </body>
</html>
