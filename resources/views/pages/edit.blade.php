@extends("layout.site")
@section("content")
    @if($message = Session::get("message"))
        <script>
            var toastHTML = '<span>{{ $message }}</span>';
            M.toast({html: toastHTML});
        </script>
    @endif
    <div class="container">
        <div class="form-register">
            <div class="row">
                <form class="col s12" method="POST" action="{{ url("/update")."/".$product['id'] }}">
                    @csrf
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="name" name="name" value="{{ $product['name'] }}" type="text">
                            <label for="name">Product name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="price" name="price" value="{{ $product['price'] }}" type="number">
                            <label for="price">Price</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="qtd" name="qtd" value="{{ $product['qtd'] }}" type="number">
                            <label for="qtd">Quantity</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="description" name="description" value="{{ $product['description'] }}" type="text">
                            <label for="description">Description</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <span style="padding: 10px 0; display: flex; color: #9e9e9e">Completed?</span>
                            <div class="switch">
                                <label>
                                    No
                                    <input
                                        type="checkbox"
                                        name="completed"
                                        {{ $product['completed'] == "Yes" ? "checked" : "" }}
                                    >
                                    <span class="lever"></span>
                                    Yes
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="btn-area">
                        <a href="{{ route('welcome') }}" class="waves-effect waves-light btn">Voltar</a>
                        <button class="btn waves-effect waves-light" type="submit" name="action">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
