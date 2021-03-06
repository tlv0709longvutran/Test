
    @extends('layout.clients')

    @section('title')
        {{$title}}
    @endsection

    {{-- @section('sidebar')
        {{-- @parent
        <h3>Home sidebar</h3>
    @endsection --}}

    @section('css')

    @endsection

    @section('content')
        <h1>Thêm Sản Phẩm</h1>
        <form action="{{route('post-add')}}" method="post" id="product-form">

                <div class="alert alert-danger text-center msg" style="display: none">

                </div>

            <div class="mb-3">
                <label for="">Tên Sản Phẩm</label>
                <input type="text" class="form-control" name="product_name" placeholder="Tên Sản Phẩm.....">
            </div>
                <span style="color: red" class="error product_name_error"></span>
            <div class="mb-3">
                <label for="">Giá Sản Phẩm</label>
                <input type="text" class="form-control" name="product_price" placeholder="Giá Sản Phẩm.....">
            </div>
            <span style="color: red" class="error product_price_error"></span>

            <button type="submit" class="btn btn-primary">Thêm mới</button>

            @csrf
        </form>
    @endsection
    @section('js')
        <script>
            $(document).ready(function(){
                $('#product-form').on('submit' , function(e){
                    e.preventDefault();

                    let productName = $('input[name="product_name"]').val().trim();

                    let productPrice = $('input[name="product_price"]').val().trim();

                    let actionUrl = $(this).attr('action')

                    let csrfToken = $(this).find('input[name="_token"]').val();

                    $('.error').text('');

                    $.ajax({
                        url: actionUrl,
                        type: 'POST',
                        data : {
                            product_name: productName,
                            product_price: productPrice,
                            _token : csrfToken
                        },
                        dataType : 'json',
                        success : function(response){
                            console.log(response);
                        },
                        error : function(error) {
                            $('.msg').show()

                            let responseJSON = error.responseJSON.errors;

                            if(responseJSON.length>0) {
                                for(let key in responseJSON){
                                    $('.'+key + '_error').text(responseJSON[key][0]);
                                }
                            }
                        }
                    });
                });
            });
        </script>
    @endsection
