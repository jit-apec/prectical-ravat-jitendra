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
                        <h3 class="card-title ">Critical Products Stock</h3>
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
                                    <td class="text-center">  @php  echo date_format($product->created_at,"D/M/Y H:i:s"); @endphp</td>
                                    <td class="text-center">  @php  echo date_format($product->updated_at,"D/M/Y H:i:s"); @endphp</td>
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

@endsection
