<!doctype html>
<html lang="en">
  <head>
    <title>Login Admin</title>
    <script defer data-api="/stats/api/event" data-domain="preview.tabler.io" src="/stats/js/script.js"></script>
     <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon"/>
      <!-- CSS files -->
    <link href="{{ asset('tabler/css/tabler.min.css') }}" rel="stylesheet"/>
    <!-- <link href="{{ asset('tabler/css/tabler-flags.min.css?1695847769') }}" rel="stylesheet"/> -->
    <!-- <link href="{{ asset('tabler/css/tabler-payments.min.css?1695847769') }}" rel="stylesheet"/> -->
    <!-- <link href="{{ asset('tabler/css/tabler-vendors.min.css?1695847769') }}" rel="stylesheet"/> -->
    <!-- <link href="{{ asset('tabler/css/demo.min.css?1695847769') }}" rel="stylesheet"/> -->
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>
  </head>
  <body  class=" d-flex flex-column">
    <script src="{{ asset('tabler/js/demo-theme.min.js?1695847769') }}"></script>
    <div class="page page-center">
      <div class="container container-normal py-4">
        <div class="row align-items-center g-4">
          <div class="col-lg">
            <div class="container-tight">
              <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark"><img src="{{ asset('tabler/static/logo.svg') }}" height="36" alt=""></a>
              </div>
              <div class="card card-md">
                <div class="card-body">
                  <h2 class="h2 text-center mb-4">Login Sebagai Admin</h2>
                  <form action="/login" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label class="form-label">Email address</label>
                      <input type="email" name="email" class="form-control" placeholder="your@email.com" autocomplete="off">
                    </div>
                    <div class="mb-2">
                      <label class="form-label">
                        Password
                      </label>
                      <div class="input-group input-group-flat">
                        <input type="password" name="password" class="form-control"  placeholder="Your password"  autocomplete="off">
                        <span class="input-group-text">
                          <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                          </a>
                        </span>
                      </div>
                    </div>
                    <div class="mb-2">
                      <label class="form-check">
                        <input type="checkbox" class="form-check-input"/>
                        <span class="form-check-label">Remember me on this device</span>
                      </label>
                    </div>
                    
  <button type="submit" class="btn btn-primary w-100" >Login</button>


                  </form>
                </div>
                </div>
              </div>
              <div class="text-center text-secondary mt-3">
                Don't have account yet? <a href="{{ route('register.halaman') }}" tabindex="-1">Daftar Sebagai Admin</a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('tabler/js/tabler.min.js?1695847769') }}" defer></script>
    <script src="{{ asset('tabler/js/demo.min.js?1695847769') }}" defer></script>
  </body>
</html>