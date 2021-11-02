<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home | Unique Jewelry</title>

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
                <a class="nav-link active" aria-current="page" href="{{url(route('home'))}}">Home</a>
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
      {{-- Start Card --}}
      <div class="card">
        <div class="card-header">
          Made for me form
        </div>
        <div class="card-body">

          <form id="f_inquiry" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-md-6">

                <div class="row align-items-center mb-3">
                  <div class="col-md-4">
                    <label for="contact_person" class="col-form-label">Contact Person*</label>
                  </div>
                  <div class="col-md-8">
                    <input type="text" id="contact_person" name="contact_person" class="form-control" required>
                  </div>
                </div>

                <div class="row align-items-center mb-3">
                  <div class="col-md-4">
                    <label for="email" class="col-form-label">Email*</label>
                  </div>
                  <div class="col-md-8">
                    <input type="email" id="email" name="email" class="form-control" required>
                  </div>
                </div>

                <div class="row align-items-center mb-3">
                  <div class="col-md-4">
                    <label for="country" class="col-form-label">Country*</label>
                  </div>
                  <div class="col-md-8">
                    <select name="country" id="country" class="form-control select2" required>
                    @foreach ($country as $item)
                        <option value="{{$item->id_country}}">{{$item->name}}</option>
                    @endforeach
                    </select>
                  </div>
                </div>

                <div class="row align-items-center mb-3">
                  <div class="col-md-4">
                    <label for="zip_code" class="col-form-label">Zip Code*</label>
                  </div>
                  <div class="col-md-8">
                    <input type="text" id="zip_code" name="zip_code" class="form-control" required>
                  </div>
                </div>

                <div class="row align-items-center mb-3">
                  <div class="col-md-4">
                    <label for="min_order" class="col-form-label">Minimum Order*</label>
                  </div>
                  <div class="col-md-8">
                    <div class="input-group">
                      <input type="number" id="min_order" name="min_order" class="form-control" required value="1">
                      <span class="input-group-text" id="pieces">piece</span>
                    </div>
                  </div>
                </div>
                <div class="row align-items-center mb-3">
                  <div class="col-md-4">
                    <label for="lead_time" class="col-form-label">Acceptable Lead Time*</label>
                  </div>
                  <div class="col-md-8">
                    <div class="input-group">
                      <input type="number" id="lead_time" name="lead_time" class="form-control" required value="14">
                      <span class="input-group-text" id="days">day(s)</span>
                    </div>
                  </div>
                </div>

              </div>
              <div class="col-md-6">

                <div class="row align-items-center mb-3">
                  <div class="col-md-4">
                    <label for="type" class="col-form-label">Type*</label>
                  </div>
                  <div class="col-md-8 border">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="type" id="ring" value="ring">
                      <label class="form-check-label" for="ring" >
                        Ring
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="type" id="bracelets" value="bracelets">
                      <label class="form-check-label" for="bracelets" >
                        Bracelets
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="type" id="necklaces" value="necklaces">
                      <label class="form-check-label" for="necklaces">
                        Necklaces
                      </label>
                    </div>
                  </div>
                </div>
                <div class="row align-items-center mb-3">
                  <div class="col-md-4">
                    <label for="material" class="col-form-label">Material*</label>
                  </div>
                  <div class="col-md-8 border">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="material" id="silver" value="silver">
                      <label class="form-check-label" for="silver" >
                        Silver
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="material" id="gold" value="gold">
                      <label class="form-check-label" for="gold" >
                        Gold
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="material" id="both" value="both">
                      <label class="form-check-label" for="both" >
                        Silver & Gold
                      </label>
                    </div>
                  </div>
                </div>

                <div class="row align-items-center mb-3">
                  <div class="col-md-4">
                    <label for="description" class="col-form-label">Description</label>
                  </div>
                  <div class="col-md-8">
                    <textarea name="description" id="description" class="form-control" rows="4"></textarea>
                  </div>
                </div>
                <div class="row align-items-center mb-3">
                  <div class="col-md-4">
                    <label for="reference" class="col-form-label">References</label>
                  </div>
                  <div class="col-md-8 border py-2">
                    <div class="mb-3">
                      <input type="file" name="file_reference" id="file_reference" class="form-control">
                    </div>
                    <div class="mb-3">
                      <label for="link1" class="form-label">Link 1</label>
                      <input type="url" class="form-control" id="link1" name="link1">
                    </div>
                    <div class="mb-3">
                      <label for="link2" class="form-label">Link 2</label>
                      <input type="url" class="form-control" id="link2" name="link2">
                    </div>
                  </div>
                </div>

              </div>

              <div class="col-md-12 my-3">
                <span class="fst-italic">We require that you fill in items market with an asterisk(*)</span>
              </div>
              <div class="col-md-12">
                <div class="d-grid">
                  <button type="submit" class="btn btn-primary" id="btn_save">Submit</button>
                </div>
              </div>

            </div>
            {{-- ENd row --}}
          </form>

        </div>
        {{-- End Card Body --}}
      </div> 
      {{-- End Card --}}
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
          $('.select2').select2();
            $('#f_inquiry').submit(function(evt){
              evt.preventDefault();
              var btn = $("#btn_save");
              btn.prop('disabled',true);
              btn.text('Submitting...');
              let formData = new FormData(this);
              $.ajax({
                  type : 'POST',
                  url : '{{url("inquiry/store")}}',
                  data : formData,
                  cache : false,
                  contentType : false,
                  processData : false,
                  dataType:'json'
              })
              .done(function(response) {
                  swal.fire({
                      text: response.message,
                      icon: "success",
                      confirmButtonText: "Ok!",
                      allowOutsideClick: false
                  }).then(function(result) {
                      if (result.value) {
                          btn.prop('disabled',false);
                          btn.text('Submit');
                          location.reload();
                      }
                  })
                
              })
              .fail(function(x, status, error) {
                  if(x.status==422) {
                      var html_warning = ``;
                      $.each(x.responseJSON.errors, function( index, value ) {
                          $('#msg_'+index).html(value);
                          html_warning += value+`<br>`;
                      });
                      swal.fire({
                          html: html_warning,
                          icon: "warning",
                          confirmButtonText: "Ok!"
                      })
                  } else {
                      swal.fire({
                          text: "An error occurred: " + x.status + ", nError: " + error,
                          icon: "error",
                          confirmButtonText: "Ok!"
                      })
                  }
                  btn.prop('disabled',false);
                  btn.text('Submit');
                  
              })
          });
        })
    </script>
</body>
</html>