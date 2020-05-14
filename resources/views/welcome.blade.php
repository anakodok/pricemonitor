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
  <div class="container" style="margin-top: 2rem">
    <div class="row">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xs-offset-3">
        <div class="card">
          <div class="card-body">
            <form action="/list" method="POST" class="form-inline">
              @csrf
              <label for="url" class="mr-sm-2">Fabelio Product URL</label>
              <input type="text" name="url" id="url" class="form-control mb-2 mr-sm-2">
              <button type="submit" class="btn btn-primary mb-2">Process URL</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

