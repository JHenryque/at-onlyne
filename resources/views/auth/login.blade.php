<x-layout-guest title="Login">
    <div class="container mt-5 ">
        <div class="row align-items-center justify-content-center">
            <div class="col-6">


                <!-- login form -->
                <div class="card p-5 ">

                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                            @error('email')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password">Senha</label>
                            <input type="password" class="form-control" id="password" name="password">
                            @error('password')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('password.request') }}">Esqueceu a sua senha?</a>
                            <button type="submit" class="btn btn-primary px-4">Entrar</button>
                        </div>

                    </form>

                    @if(session('status'))
                        <div class="mt-5 alert alert-success py-2 text-center">Senha alterada com sucésso!</div>
                    @endif

                </div>

            </div>
        </div>
    </div>
</x-layout-guest>
