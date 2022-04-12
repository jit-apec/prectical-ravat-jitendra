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
                            <li class="breadcrumb-item "><a
                                    href="{{ url('/laravel/test3/public/admin/product/') }}">Product</a>
                            </li>
                            <li class="breadcrumb-item active">Add</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <form method="post" action="/laravel/test3/public/admin/product/add" id="form_validation">
                @csrf
                <div class="container-fluid">
                    <div class="card card-primary ">
                        <div class="card-header mt-0 mb-0 p-2">
                            <h3 class="card-title">Add Product</h3>

                            <a class=" float-right " href="{{ url('/admin/product/') }}"><i class="fa fa-arrow-left"
                                    aria-hidden="true"></i> Back</a>&nbsp;
                        </div>
                        <div class="card-body">
                            @if (session()->has('status'))
                                <div class="text-success"> {{ session('status') }}</div>
                            @endif

                            <h6>The All Fields With Sysmbol <span class="text-danger">*</span>is Required</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name">Name<span class="text-danger">*</span></label>
                                    @error('name')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                    <span id="lblError" style="color: red"></span>
                                    <span id="lblErrorediturl" style="color: red"></span>
                                    <input type="text" class="form-control valid" id="replace" name="name"
                                        placeholder="Enter Name"
                                        oninput="this.value = this.value.replace(/[^A-Za-z/0-9_\s]/g, '').replace(/(\..*)\./g, '$1');"
                                        data-error="#errname"><span id="errname"></span><br>

                                </div>

                                <div class="form-group col-md-6">
                                    <label for="tag">Select Tag<span class="text-danger">*</span></label>
                                    @error('tag')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                    <select id="tag" name="tag" class="form-control">
                                        <option value="">Select Tag</option>
                                        <option>TopSelling</option>
                                        <option>Trending</option>
                                        <option>OnDemand</option>
                                        <option>NewInStock</option>
                                    </select>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="inputstock">Price<span class="text-danger">*</span></label>
                                    @error('price')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                    <div class="">
                                        <input type="text" class="form-control" name="price" id="" placeholder="Enter price" pattern="[0-9]{1,6}"
                                            oninput="this.value = this.value.replace(/[^/0-9_\s]/g, '').replace(/(\..*)\./g, '$1');"
                                            data-error="#errprice">
                                    </div>
                                    <span id="errprice"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputstock"> Stock<span class="text-danger">*</span></label>
                                    @error('stock')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-layer-group"></i></div>
                                        </div>
                                        <input type="text" class="form-control" name="stock" placeholder="Enter Stock" id="" pattern="[0-9]{1,6}"
                                            oninput="this.value = this.value.replace(/[^/0-9_\s]/g, '').replace(/(\..*)\./g, '$1');"
                                            data-error="#errstock">

                                    </div>
                                    <span id="errstock"></span>
                                </div>

                            </div>
                            <div class="from-row">
                                <div align="center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script type="text/javascript">
       $('#form_validation').validate({
            rules: {
                name: {
                    required: true,
                },
                price: {
                    required: true,
                    maxlength:5,
                },
                stock:{
                    required: true,
                    maxlength:5,
                },
                tag:{
                    required: true,
                },
            },
            messages: {},
                errorPlacement: function(error, element) {
                    var placement = $(element).data('error');
                    if (placement) {
                        $(placement).append(error)
                    } else {
                        error.insertAfter(element);
                    }
                }
        });
    </script>
@endsection
