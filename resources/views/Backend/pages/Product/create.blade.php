@extends('Backend.layouts.master')

@section('title')
    Product Create
@endsection
@push('admin_style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('admin.content')
    <div class="row">
        <h2>Product Create Form</h2>
        <div class="col-md-12">
            <div class="d-flex justify-content-start">
                <a href="{{ route('products.index') }}" class="btn btn-primary">
                    <i class="fa fa-backward"></i>
                    Back to Products
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-3">
              <label for="category-name" class="form-label">Select Category</label>
              <select name="category_id" class="form-select">
                @foreach ($categories as $category )
                 <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
              </select>
              @error('category_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="col-12 mb-3">
                <label for="product-name" class="form-label">Product Name</label>
                <input type="text" name="name" class="form-control @error('name')
                is-invalid
                @enderror" placeholder="enter Product name">
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-6 mb-3">
               <label for="alert_quality" class="form-label">Product Price</label>
               <input type="number" name="product_price" min="0" class="form-control @error('product_price')
                  is-invalid
               @enderror" id="product_price" >
               @error('product_price')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
           @enderror
            </div>
            <div class="col-6 mb-3">
                <label for="product-code" class="form-label">Product code</label>
                <input type="text" name="product_code" class="form-control @error('product_code')
                   is-invalid
                @enderror" placeholder=" enter a unique product code" >
                @error('product_code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
             </div>
             <div class="col-6 mb-3">
                <label for="product-stock" class="form-label">Product stock</label>
                <input type="number" name="product_stock" min="1" class="form-control @error('product_stock')
                   is-invalid
                @enderror" id="product_stock" >
                @error('product_stock')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
             </div>
             <div class="col-6 mb-3">
                <label for="alert_quality" class="form-label">Alert Quality</label>
                <input type="number" name="alert_quality" min="1" class="form-control @error('alert_quality')
                   is-invalid
                @enderror" id="alert_quality" >
                @error('alert_quality')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
             </div>
             <div class="col-12 mb-3">
                <label for="short_description" class="form-control">Short Description</label>
                <textarea name="short_description" class="form-control @error('short_description')
                     is-invalid
                @enderror" id="short_description" cols="30" rows="5"></textarea>
                @error('short_description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
             </div>
             <div class="col-12 mb-3">
                <label for="long_description" class="form-control">Long Description</label>
                <textarea name="long_description" class="form-control @error('long_description')
                     is-invalid
                @enderror" id="long_description" cols="30" rows="5"></textarea>
                @error('long_description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
             </div>
             <div class="col-12 mb-3">
                <label for="additional_info" class="form-control">Additional Info</label>
                <textarea name="additional_info" class="form-control @error('additional_info')
                     is-invalid
                @enderror" id="additional_info" cols="30" rows="5"></textarea>
                @error('additional_info')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
             </div>
             <div class="col-12 mb-3">
                <label for="product-image" class="form-control">Product Image</label>
                <input type="file" name="product_image" class="form-control dropify @error('product_image')
                is-invalid
               @enderror"  id="">
                   @error('product_image')
                     <span class="invalid-feedback" role="alert">
                       <strong>
                           {{ $message }}
                       </strong>
                     </span>
                   @enderror
             </div>
             <div class="col-6 mb-3 form-check form-switch">
                <input class="form-check-input" name="is_active" type="checkbox"
                role="switch" id="activeStatus" checked>
                <label class="form-check-label" for="activeStatus">Active or Inactive</label>
                @error('name')
                  <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}
                        </strong>
                  </span>
                @enderror
            </div>
            <div class="mt-5">
                <button type="submit" class="btn btn-success">
                    Store
                </button>
            </div>
        </div>
    </div>
@endsection

@push('admin_script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $('.dropify').dropify();
</script>
@endpush
