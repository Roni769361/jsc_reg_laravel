   <script src="{{asset('backend')}}/assets/libs/jquery/dist/jquery.min.js"></script>
   <script src="{{asset('backend')}}/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
   <script src="{{asset('backend')}}/assets/js/sidebarmenu.js"></script>
   <script src="{{asset('backend')}}/assets/js/app.min.js"></script>
   <script src="{{asset('backend')}}/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
   <script src="{{asset('backend')}}/assets/libs/simplebar/dist/simplebar.js"></script>
   <script src="{{asset('backend')}}/assets/js/dashboard.js"></script>
   <!-- solar icons -->
   <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>


   <script>
      @if(session('success'))
      toastr.success("{{ session('success') }}");
      @endif

      @if(session('error'))
      toastr.error("{{ session('error') }}");
      @endif

      @if($errors -> any())
      @foreach($errors -> all() as $error)
      toastr.warning("{{ $error }}");
      @endforeach
      @endif
   </script>