<x-guest-layout>
  
    <div class="container">
        <div class="auth-box login-box">
            <!-- Start row -->
            <div class="row no-gutters align-items-center justify-content-center">
                <!-- Start col -->
                <div class="col-md-6 col-lg-5">
                    <!-- Start Auth Box -->
                    <div class="auth-box-right">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-head">
                                        <a href="{{url('/')}}" class="logo"><img src="img/logo3.png" class="img-fluid" alt="logo"></a>
                                    </div>                                        
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="email" id="email" placeholder="Email ID" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                    </div>
                                               
                                  <button type="submit" class="btn btn-success btn-lg btn-block font-18">Log in</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Auth Box -->
                </div>
                <!-- End col -->
            </div>
            <!-- End row -->
        </div>
    </div>
  
</x-guest-layout>


