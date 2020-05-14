<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Price Monitor - Matius Kristyanto Mulyono</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>
<body>
  <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Fabelio Price Monitor</h5>
    <nav class="my-2 my-md-0 mr-md-3">
      <a class="p-2 text-dark" href="/">Home</a>
      <a class="p-2 text-dark" href="/list">Link List</a>
    </nav>
  </div>

  <div class="container">
    <div class="card mt-5">
      <div class="card-header text-center">
        Product Price History
      </div>
      <div class="card-body">
        <table class="table table-borderless">
          <tbody>
            <tr>
              <td rowspan="2"><img src="{{$product->imageUrl}}" width="150px"></td>
              <td><a href="{{$product->product_url}}" target="_blank"><h1>{{$product->product_name}}</h1></a></td>
            </tr>
            <tr>
              <td style="text-align: justify">{{$product->description}}</td>
            </tr>
          </tbody>
        </table>
        <table class="table table-bordered table-hover table-striped">
          <thead>
            <tr>
              <td>Unit Price</td>
              <td>Unit Sale Price</td>
              <td>Recorded On</td>
            </tr>          
          </thead>
          <tbody>
          @foreach ($prices as $price)
          <tr>
            <td>{{$price->unit_price}}</td>
            <td>{{$price->unit_sale_price}}</td>
            <td>{{$price->created_at}}</td>
          </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>