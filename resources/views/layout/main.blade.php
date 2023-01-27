<!doctype html>
<html lang="pt-br">
@include('layout.head')

<body>
  @include('layout.customTemplate')
  <div class="wrapper">
    @include('layout.header', ['page' => $page])
    @include('layout.siderbar')
    
    <div class="main-panel">
      <div class="content">
        @yield('content')
      </div>
      <main>
        <div class="container-fluid">
          <div class="row">
            @if(session('sucess'))
            <p class="sucess">{{session('sucess')}}</p>
            @endif
            @yield('content')

          </div>
        </div>
      </main>
      @include('layout.footer')
    </div>
    
  </div>

  @yield('scripts')
</body>
</html>