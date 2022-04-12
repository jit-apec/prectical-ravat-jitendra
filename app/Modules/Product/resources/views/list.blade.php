@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active"><a href="{{ url('/home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item">Product</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-md-12  ">
                <div class="card card-primary p-1 ">
                    <div class="card-header mt-2 mb-2 p-2">
                        <h3 class="card-title ">Products</h3>
                    </div>
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th class="text-center"> Sr No.</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Tag</th>
                                <th class="text-center">Available Stock</th>
                                <th class="text-center">Published Date</th>
                                <th class="text-center">Updated Date</th>
                                <th class="text-center">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php  $count=0; @endphp
                            @foreach ($products as $product)
                                <tr>
                                    <td class="text-center">{{ $count += 1 }}</td>
                                    <td class="text-center">{{ $product->name }}</td>
                                    <td class="text-center">{{ $product->tag }}</td>
                                    <td class="text-center">{{ $product->stock }}</td>
                                    <td class="text-center">
                                      @php  echo date_format($product->created_at,"D/M/Y H:i:s"); @endphp</td>
                                      <td class="text-center">  @php  echo date_format($product->updated_at,"D/M/Y H:i:s"); @endphp</td>
                                    <td class="text-center">
                                        <a href="{{ url('/admin/product/edit', $product->id) }}"
                                            class="fas fa-pencil-alt "></a>
                                        <a href="javascript:void(0);" onclick="delete_product({{ $product->id }})"
                                            class="fas fa-trash-alt "></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        function delete_product(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm!'
            }).then(function()
            {
                    jQuery.ajax({
                        url: "{{ url('/admin/product/delete') }}",
                        type: 'GET',
                        data: {
                            'id': id,
                        },
                        success: function(result) {
                            console.log("Status Updated");
                            swal("Product Delete Successfully");
                            window.location.reload();
                        }
                    });
            });
        }
    </script>
@endsection
