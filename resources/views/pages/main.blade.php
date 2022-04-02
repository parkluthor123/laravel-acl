@extends("layout.site")
@section("content")
    @if($message = Session::get("message"))
        <script>
            var toastHTML = '<span>{{ $message }}</span>';
            M.toast({html: toastHTML});
        </script>
    @endif
    <div class="container">
        <div class="products-area">
            @can('manage-products')
                <div class="btn-area">
                    <a href="{{ route("register") }}" class="waves-effect waves-light btn">Register</a>
                </div>
            @endcan
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Description</th>
                        <th>Completed</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($product as $newProducts)
                        <tr>
                            <td>{{ $newProducts['name'] }}</td>
                            <td>{{ $newProducts['price'] }}</td>
                            <td>{{ $newProducts['qtd'] }}</td>
                            <td>{{ $newProducts['description'] }}</td>
                            <td>{{ $newProducts['completed'] }}</td>
                            <td>
                                <div class="btn-wrapper">

                                    <a href="{{ url('/edit')."/".$newProducts['id'] }}" class="btn-floating btn-large cyan"><i class="material-icons">edit</i></a>
                                    <button data-target="modal1" class="btn-floating btn-large red btn modal-trigger"><i class="material-icons">delete_sweep</i></button>

                                    <div id="modal1" class="modal">
                                        <div class="modal-content">
                                            <h4>Delete product</h4>
                                            <p>Are you sure?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="#!" class="modal-close waves-effect waves-green btn-flat">No</a>
                                            <a href="{{ url('/delete')."/".$newProducts['id'] }}" class="modal-close waves-effect waves-green btn-flat">Yes</a>
                                        </div>
                                    </div>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $product->links('vendor.pagination.default') }}
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems);
        });
    </script>
@endsection
