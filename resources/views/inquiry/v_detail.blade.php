<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Inquiry | Unique Jewelry</title>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.11.2/datatables.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{url(route('home'))}}">Unique Jewelry</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{url(route('home'))}}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">E-shop</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
            </ul>

          </div>
        </div>
      </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 px-3">
                <h4>Inquiry From {{$data_inquiry->contact_person}}</h4>
                <span>{{$data_inquiry->email}}</span>

                <table class="table my-4">
                    <tr>
                        <td width="35%">Submitted at</td>
                        <td>{{$data_inquiry->created_date}}</td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td>{{$data_inquiry->type}}</td>
                    </tr>
                    <tr>
                        <td>Material</td>
                        <td>{{$data_inquiry->material}}</td>
                    </tr>
                    <tr>
                        <td>Minimum Order</td>
                        <td>{{$data_inquiry->min_order}} pieces</td>
                    </tr>
                    <tr>
                        <td>Acceptable Lead Time</td>
                        <td>{{$data_inquiry->lead_time}} days</td>
                    </tr>
                </table>
                <h4>Description</h4>
                <div class="text-justify">{{nl2br($data_inquiry->description)}}</div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <h6 class="card-header">While we are reviewing your inquery, here some product that may interest you</h6>
                    <div class="card-body">
                    <p class="card-text">Content</p>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.11.2/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/id.min.js" integrity="sha512-he8U4ic6kf3kustvJfiERUpojM8barHoz0WYpAUDWQVn61efpm3aVAD8RWL8OloaDDzMZ1gZiubF9OSdYBqHfQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {

        })
    </script>
</body>
</html>