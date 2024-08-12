<div class="container-fluid bg-secondary pt-5 bg-opacity-10 mt-4">
  <div class="d-flex flex-column flex-sm-row justify-content-between pt-3 border-bottom">
    <div class="d-flex mx-auto">
      @if(isset($setting->facebook))
      <a class="btn fw-bold" href="{{$setting->facebook}}"><i class="bi bi-facebook"></i> </a>
      @endif
      @if(isset($setting->twitter))
      <a class="btn fw-bold" href="{{$setting->twitter}}"><i class="bi bi-twitter"></i></a>
      @endif
      @if(isset($setting->instagram))
      <a class="btn fw-bold" href="{{$setting->instagram}}"><i class="fa-brands fa-instagram"></i></a>
      @endif
      @if(isset($setting->linkedin))
      <a class="btn fw-bold" href="{{$setting->linkedin}}"><i class="fa-brands fa-linkedin"></i></a>
      @endif
    </div>
  </div>
  <div class="d-flex flex-column flex-sm-row justify-content-center pt-3">
    @foreach($pages as $page)
    <a href="{{ route('page',$page->slug) }}" class="link-secondary text-decoration-none mx-2">{{$page->name}}</a>
    @endforeach
  </div>
  <div class="d-flex flex-column flex-sm-row justify-content-center pt-3">
    <a class="btn" href="{{ route('home') }}">
      <img src="{{ asset('image/' . $setting->logo_empresa_footer) }}" alt="{{$setting->name}}" class="logo" width="auto" height="50px" />
    </a>
  </div>
  <div class="d-flex flex-column flex-sm-row justify-content-center pt-3">
    <p class="mb-0 text-secondary">{{$setting->description}}</p>
  </div>

  <div class="container">
    <footer class="py-5">
      <div class="d-flex flex-column flex-sm-row justify-content-center py-4 my-4">
        <div class="">
          <p>© 2023 <a class="link-offset-2 link-underline link-underline-opacity-0 text-decoration-none" href="https://knots.agency/" target="_blank">Knots Agency.</a> {{__('message.All right reserved')}}.</p>
        </div>
      </div>
    </footer>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

{{--<script type="text/javascript">
  // In your Javascript (external.js resource or <script> tag)
  $(document).ready(function() {
    $('.select2').select2({
      theme: "classic"
    });
  });
</script>--}}

</body>

</html>