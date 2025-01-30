<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
      <div class="card px-sm-6 px-0">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="{{url('/')}}" class="app-brand-link gap-2">
              <span class="app-brand-logo demo">@include('_partials.macros',["width"=>25,"withbg"=>'var(--bs-primary)'])</span>
              <span class="app-brand-text demo text-heading fw-bold">{{config('variables.templateName')}}</span>
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-1">Welcome tawdao {{config('variables.templateName')}}! 👋</h4>
          <p class="mb-6">Please sign-in to your account and start the adventure</p>

          <form wire:submit="login" class="mb-6">
            <div class="mb-6">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" wire:model="email" placeholder="Enter your email or username" autofocus>
                @error('email') <span class="text-danger mt-4">{{ $message }}</span> @enderror
            </div>
            <div class="mb-6 form-password-toggle">
                <label class="form-label" for="password">Password</label>
                <div class="input-group input-group-merge">
                    <input type="password" id="password" class="form-control" wire:model="password" placeholder="********" />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
                @error('password') <span class="text-danger mt-4">{{ $message }}</span> @enderror
            </div>
            <div class="mb-6">
                <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
            </div>
        </form>
          <p class="text-center">
            <span>New on our platform?</span>
            <a href="{{url('auth/register-basic')}}">
              <span>Create an account</span>
            </a>
          </p>
        </div>
      </div>
    </div>
    <!-- /Register -->
  </div>
</div>
