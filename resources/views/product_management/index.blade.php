@extends('layouts.main')
@section('content')
    <x-sidebar data="product_management"/>

    <div class="main-panel">
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header button-header">
                            <h2 class="title">Product List</h2>
                            <a href="{{ route("product.add") }}">
                                <input type="button" value="Add New Product" class="btn btn-fill btn-primary">
                            </a>
                        </div>
                        <form method="POST" action="{{ route('product-management') }}" id="product_form">
                        @csrf

</div>

                            <input type="hidden" name="product_id" id="product_id">
                            <input type="hidden" name="action" id="action">

                            <table class="table col-md-12">
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">Image</th>
                                <th scope="col" class="text-center">Product Name</th>
                                <th scope="col" class="text-center">Category</th>
                                <th scope="col" class="text-center">Quantity</th>
                                <th scope="col" class="text-center">Company Name</th>
                                <th scope="col" class="text-center"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($products as $product)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{  asset('assets/img'). '/' .$product->image }}" style="width: 100px" />
                                    </td>
                                    <td class="text-center">{{ $product->product_name }}</td>
                                    <td class="text-center">{{ $product->category }}</td>
                                    <td class="text-center">{{ $product->quantity }}</td>
                                    <td class="text-center">{{ $product->sr_company }}</td>
                                    <td class="text-center">
                                        <span class="mx-2" id="view_product_detail">
                                            <i class="fa-regular fa-eye"></i>
                                        </span>
                                        <span class="mx-2" id="edit_product">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </span>
                                        <span class="mx-2" id="delete_product" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="fa-solid fa-trash"></i>
                                        </span>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Launch static backdrop modal
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="8">No data found!!!</td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script>
    $(() => {
        $('#delete_product').click(() => {
            $('#product_id').val({{ $product->id }})
            $('#action').val('delete')
            $('#product_form').submit()
        })

    })
</script>
@endsection
