<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="canonical" href="{{ url()->full() }}">
  <link rel="sitemap" href="/sitemap.xml" title="Sitemap" type="application/xml">
  <link rel="icon" type="image/svg+xml" href="{{ asset(setting('logo')) }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset(setting('logo')) }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset(setting('logo')) }}">
  <link rel="shortcut icon" href="{{ asset(setting('logo')) }}">
  <meta name="robots" content="max-snippet:-1,max-image-preview:large,max-video-preview:-1">
  <meta name="description" content="{{ strip_tags(setting('desc')) }}">
  <meta name="keywords" content="{{ strip_tags(setting('keywords')) }}">
  <meta name="author" content="{{ setting('title_'.lang()) }}">
  <meta name="image" content="{{ asset(setting('logo')) }}">
  <meta property="og:title" content="{{ setting('title_'.lang()) }}">
  <meta property="og:description" content="{{ strip_tags(setting('desc')) }}">
  <meta property="og:locale" content="en">
  <meta property="og:image" content="{{ asset(setting('logo')) }}">
  <meta property="og:url" content="{{ url()->full() }}">
  <meta property="og:site_name" content="{{ setting('title_'.lang()) }}">
  <meta property="og:type" content="website">
  <meta name="twitter:card" content="{{ setting('title_'.lang()) }}">
  <meta name="twitter:title" content="{{ setting('title_'.lang()) }}">
  <meta name="twitter:description" content="{{ strip_tags(setting('desc')) }}">
  <meta name="twitter:site" content="@{{ setting('title_'.lang()) }}">
  <meta name="csrf-token" content="UA03C1pxmumaEQe8eqQuogEL9x4lDE8HyhaSlguZ">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="google-site-verification" content="orJ7ZbMHiPkMYkLCmiZpVFPHiWeJYzxBdmYrqe4q-0E" />
  <meta content='max-age=604800' http-equiv='Cache-Control' />
  <include expiration='7d' path='*.css' />
  <include expiration='7d' path='*.js' />
  <include expiration='3d' path='*.gif' />
  <include expiration='3d' path='*.jpeg' />
  <include expiration='3d' path='*.jpg' />
  <include expiration='3d' path='*.png' />
  <include expiration='3d' path='*.webp' />
  <include expiration='3d' path='*.ico' />
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset(setting('logo')) }}">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets_client/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets_client/css/all.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
    integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link
    href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Tajawal:wght@200;300;400;500;700;800;900&display=swap"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap"
    rel="stylesheet">
    <link href="https://vjs.zencdn.net/8.10.0/video-js.css" rel="stylesheet" />

  <link rel="stylesheet" href="{{ asset('assets_client/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets_client/css/Responsive.css') }}">
  <title>
    @if (Route::is('client.home'))
      {{ setting('title_'.lang()) }}
    @else
      {{ setting('title_'.lang()) }} |  @yield('title')
    @endif
  </title>


  <style>
    .rating h4::after{
      content: none;
    }

    .logo_image{
      height: 65px !important;
    }
  </style>

  @stack('links')
  @stack('styles')
</head>

<body class="{{ lang() == 'ar'? 'arabicVersion' : '' }}" style="direction:{{ lang('en') ? 'ltr' : 'rtl' }}" >

  <!-- Navbar -->
  @include('client.layout.navBar')

  @yield('content')

  <div class="modal fade " id="register" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered ">
      <div class="modal-content bg-light">
        <div class="modal-header d-flex justify-content-end">
          <div role="button" class="button-close d-flex gap-1" data-bs-dismiss="modal" aria-label="Close">
            <span><i class="fa-regular fa-circle-xmark secondary-color"></i></span>
          </div>
        </div>
        <div class="modal-body">
          <form class="row p-2 rounded-3" method="post" action="{{  route('client.contactUs')}}">
            @csrf
            <div class="col-6">
              <label for="FirstName" class="form-label fw-semibold">
                @lang('trans.first_name')<span class="text-danger">*</span>
              </label>
              <div class="input-group mb-3">
                <input type="text" class="form-control rounded-3 border-0 py-2" name="first_name" id="FirstName" required>
              </div>
            </div>
            <div class="col-6">
              <label for="LastName" class="form-label fw-semibold">
                @lang('trans.last_name')<span class="text-danger">*</span>
              </label>
              <div class="input-group mb-2">
                <input type="text" class="form-control rounded-3 border-0 py-2" name="last_name" id="LastName" required>
              </div>
            </div>
            <div class="col-12">
              <label for="email" class="form-label fw-semibold">
                @lang('trans.email_address')<span class="text-danger">*</span>
              </label>
              <div class="input-group mb-2">
                <input type="text" class="form-control rounded-3 border-0 py-2" name="email" id="email" required>
              </div>
            </div>
            <div class="col-12">
              <label for="Subject" class="form-label fw-semibold">
                @lang('trans.subject')<span class="text-danger">*</span>
              </label>
              <div class="input-group mb-2">
                <input type="text" class="form-control rounded-3 border-0 py-2" name="subject" id="Subject" required>
              </div>
            </div>
            <div class="col-12">
              <label for="phonenumber" class="form-label fw-semibold">
                @lang('trans.phone_number')<span class="text-danger">*</span>
              </label>
              <div class="input-group mb-2 w-100">
                <input type="tel" name="phone" id="phone" class="form-control rounded-3 border-0 py-2 w-100" />
              </div>
            </div>
            <div class="col-12">
              <label for="Notes" class="form-label fw-semibold">
                @lang('trans.message')<span class="text-danger">*</span>
              </label>
              <div class="input-group mb-2">
                <textarea style="resize: none;" class="form-control rounded-3 border-0" name="message" id="Notes" rows="5"></textarea>
              </div>
            </div>
            <div class="col-12 d-flex justify-content-end align-items-center">
              <button type="submit" class="bg-primary-color btn w-auto px-5 rounded-3 border-0 my-3 rounded-1 text-white fw-semibold py-2">
                @lang('trans.send_message')
              </button>
            </div>
          </form>
        </div>
      </div>


    </div>
  </div>

  <!-- footer -->
  @include('client.layout.footer')


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"
    integrity="sha512-X/YkDZyjTf4wyc2Vy16YGCPHwAY8rZJY+POgokZjQB2mhIRFJCckEGc6YyX9eNsPfn0PzThEuNs+uaomE5CO6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
    integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://vjs.zencdn.net/8.10.0/video.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <script src="{{ asset('assets_client/js/index.js') }}"></script>


  <!-- Sliders section -->
  <script>

    AOS.init({
      once: true
    });
  </script>


  <!-- Input validation To choose which (numeric or alphabetic) according to input name  -->
  <script>
    document.querySelectorAll("input[name='first_name'], input[name='last_name']").forEach(function(input) {
      input.addEventListener('input', function (e) {
        var value = e.target.value;
        e.target.value = value.replace(/\d/g, ''); // Remove numeric characters
      });
    });


    document.querySelector("input[name='phone']").addEventListener('input', function (e) {
      var input = e.target;
      var value = input.value;
      input.value = value.replace(/[A-Za-z\u0600-\u06FF\s]/g, ''); // Remove alphabetic characters and spaces
    });

    document.querySelector('form').addEventListener('submit', function (e) {
      var nameInput = document.getElementById('name');
      var phoneInput = document.getElementById('phone');
      var nameValue = nameInput.value.trim();
      var phoneValue = phoneInput.value.trim();

      if (/^\d+$/.test(nameValue)) {
        alert('Name cannot be only numbers.');
        e.preventDefault();
        return false;
      }

      if (/^[A-Za-z\s]+$/.test(phoneValue)) {
        alert('Phone number cannot be only alphabetic characters.');
        e.preventDefault();
        return false;
      }
    });

    // Array of element IDs
    var emailInputIds = ['email'];
    emailInputIds.forEach(function(id) {
      var emailInput = document.getElementById(id);
      if (emailInput) { // Check if the element exists
        emailInput.addEventListener('input', function() {
          var email = this.value;
          var pattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
          if (!pattern.test(email)) {
            this.setCustomValidity('Please enter a valid email in the format like sallam@gmail.com');
          } else {
            this.setCustomValidity('');
          }
        });
      }
    });
  </script>

  <!-- for tostr messages-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script>
      // Check if there are any toast messages from the backend
      @if(session('toast_message'))
      // Display the toast message using Toastr
      toastr.{{ session('toast_message')['type'] }}('{{ session('toast_message')['message'] }}');
      @endif
  </script>
  <script>
      @if(session()->has('toastr'))
      @foreach(session('toastr') as $toastr)
      @if($toastr['type'] === 'error')  //if tostr_error (don't disappear automatically)
      toastr.options = {
        "closeButton": true,
        "timeOut": 0,
        "extendedTimeOut": 0
      };
      @else
              toastr.options = {
        "closeButton": true,
        "timeOut": 5000,
        "extendedTimeOut": 1000
      };
      @endif
              toastr["{{ $toastr['type'] }}"]("{{ $toastr['message'] }}");
      @endforeach
      @endif
  </script>
  <!-- for tostr messages-->

  @stack('scripts')

</body>

</html>