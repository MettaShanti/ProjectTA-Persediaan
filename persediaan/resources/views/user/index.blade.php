@extends('layouts.main')

@section('content')
    <h4>Manajemen Users</h4>
    <a href="{{route('user.create')}}" class="btn btn-primary">TAMBAH</a>

<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Nama User</th>
                <th>Email</th>
                <th>Password</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $row)
            <tr>
                <td>{{ $row['name']}}</td>
                <td>{{ $row['email']}}</td>
                <td>{{ $row['password']}}</td>
                <td>{{ $row['role']}}</td>
                {{-- untuk membuat btn ubah --}}
                <td><a href="{{ route('user.edit', $row ['id'] )}}" class="btn btn-xs btn-warning">UBAH</a>
                    {{-- untuk membuat btn hapus --}}
                    <form action="{{ route('user.destroy', $row['id'])}}" method="post" style="display:inline"> 
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-xs btn-danger" onclick="return confirm('Yakin ingin hapus data ini?')">HAPUS</button>
                    </form>
                    {{-- style="display:inline" untuk memindahkan btn ke samping --}}
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection


