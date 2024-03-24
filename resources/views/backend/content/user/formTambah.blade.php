@extends('backend/layout/main')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Tambah Data User</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{route('user.prosesTambah')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="form-label">Nama User</label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                    <span style="color:red; font-wight: 600; font-size: 9pt">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="form-label">Email User</label>
                    <input type="email" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                    <span style="color:red; font-wight: 600; font-size: 9pt">{{$message}}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">tambah</button>
                <a href="{{route('user.index')}}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>

@endsection