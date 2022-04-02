@extends("layout.site")
@section("content")
    <div class="form-area">
        <div class="row">
            <form class="col s12" method="POST" action="{{ route('doLogin') }}">
                @csrf
                <div class="row">
                    <div class="col s12">
                        <div class="input-field">
                            <input id="email_inline" type="email" name="email" class="validate">
                            <label for="email_inline">Email</label>
                            <span class="helper-text" data-error="Email inválido" data-success="Email válido">Email inválido</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" type="password" name="password" class="validate">
                        <label for="password">Senha</label>
                    </div>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="action">
                    Login
                </button>
            </form>
        </div>
    </div>
@endsection
