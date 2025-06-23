<x-layout-guest pageTitle="Alterar senha">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-5">

                <!-- logo -->
                <div class="text-center mb-5">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" width="200px">
                </div>

                <!-- redefine password -->
                <div class="card p-5">

                    @if(!session('status'))
                    <form action="{{ route('password.update') }}" method="post">

                        <input type="hidden" name="token" value="{{ $token }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password">Senha</label>
                            <input type="password" class="form-control" id="password" name="password">
                            @error('password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation">Confirmar Senha</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                            @error('password_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('login') }}">Já sei a minha senha?</a>
                            <button type="submit" class="btn btn-primary px-4">Definir Senha</button>
                        </div>

                    </form>
                    @else
                        <div class="text-center alert alert-success py-2 mb-5">Alterado com sucésso</div>
                        <div class="text-center mb-5">
                            <p class="mb-5">A sua senha foi alterada com sucessos</p>
                            <a href="{{ route('login') }} " class="btn btn-primary">Voltar ao login</a>
                        </div>
                    @endif

                </div>

            </div>
        </div>
    </div>
</x-layout-guest>
