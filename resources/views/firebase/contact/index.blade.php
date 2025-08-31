@extends('firebase.app')
@section('content')
   
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(session('status'))
                <h4 class="alert alert-warning">{{ session('status') }}</h4>
            @endif
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Contact List</h4>
                    <a class="btn btn-primary btn-sm" href="{{ url('addcontact') }}">Add Contact</a>
                </div>
                <div class="card-body">

                    <!-- 🔎 Search Form -->
                    <form action="{{ route('contacts.index') }}" method="GET" class="mb-3 d-flex">
                        <input type="text" name="query" class="form-control me-2" placeholder="Search by First Name..." value="{{ $search ?? '' }}">
                        <button type="submit" class="btn btn-outline-primary">Search</button>
                    </form>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @forelse($contacts as $key => $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item['fname'] ?? '' }}</td>
                                    <td>{{ $item['lname'] ?? '' }}</td>
                                    <td>{{ $item['email'] ?? '' }}</td>
                                    <td>{{ $item['phone'] ?? '' }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-success" href="{{ url('edit/'.$key) }}">Edit</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-danger" href="{{ url('delete/'.$key) }}">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No Record Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
