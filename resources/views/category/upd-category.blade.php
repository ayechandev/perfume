<!-- filepath: /C:/xampp/htdocs/y-perfume-app/resources/views/category/upd-category.blade.php -->
@extends('layouts.admin')
@section('content')

<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0" style="border-radius: 15px;">
                <div class="card-header text-center text-white" style="background: linear-gradient(135deg, #ff9a9e, #fad0c4); border-top-left-radius: 15px; border-top-right-radius: 15px;">
                    <h5 class="fw-bold mb-0">Update Brand</h5>
                </div>
                <div class="card-body" style="background-color: #fffaf0; border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">
                    <form action="{{ url('/admin/category/upd/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    

                        <!-- Category Name -->
                        <div class="mb-4">
                            <label for="name" class="form-label fw-semibold text-muted">Brand Name</label>
                            <input type="text" name="name" class="form-control shadow-sm" value="{{ $category->name }}" style="border-radius: 10px;">
                            @error('name')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Old Photo -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-muted">Old Photo</label>
                            <div>
                                <img src="{{ url("images/category/$category->photo") }}" width='50' height='50'>
                            </div>
                        </div>

                        <!-- New Photo -->
                        <div class="mb-4">
                            <label for="photo" class="form-label fw-semibold text-muted">New Photo</label>
                            <input type="file" name="photo" class="form-control shadow-sm" style="border-radius: 10px;">
                            @error('photo')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- <!-- Gender -->
                        <div class="mb-4">
                            <label for="gender" class="form-label fw-semibold text-muted">Gender</label>
                            <select name="gender" class="form-select shadow-sm" style="border-radius: 10px;">
                                <option value="men" {{ $category->gender == 'men' ? 'selected' : '' }}>Men</option>
                                <option value="women" {{ $category->gender == 'women' ? 'selected' : '' }}>Women</option>
                                <option value="unisex" {{ $category->gender == 'unisex' ? 'selected' : '' }}>Unisex</option>
                            </select>
                            @error('gender')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div> --}}

                        <!-- Remark -->
                        <div class="mb-4">
                            <label for="remark" class="form-label fw-semibold text-muted">Remark</label>
                            <input type="text" name="remark" class="form-control shadow-sm" value="{{ $category->remark }}" style="border-radius: 10px;">
                            @error('remark')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn text-white" style="background: linear-gradient(135deg, #ff758c, #ff7eb3); border-radius: 10px;">
                                <i class="fas fa-save"></i> Update Category
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection