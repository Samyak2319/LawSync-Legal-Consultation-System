@extends('layouts.admin')

@section('content')

<h3>All Lawyers</h3>

<table class="table mt-3">
    <thead>
        <tr>
            <th>Name</th>
            <th>Specialization</th>
            <th>Location</th>
            <th>Fee</th>
            <th>Status</th>
            <th>Action</th>
            <th>Certificate</th>
        </tr>
    </thead>

    <tbody>
        @foreach($lawyers as $lawyer)
        <tr>
            <td>{{ $lawyer->user->name }}</td>
            <td>{{ $lawyer->specialization }}</td>
            <td>{{ $lawyer->location }}</td>
            <td>₹{{ $lawyer->fee }}</td>

            <td>
                @if($lawyer->approved)
                    <span class="badge bg-success">Approved</span>
                @else
                    <span class="badge bg-warning">Pending</span>
                @endif
            </td>

            <td>
                <form method="POST" action="{{ route('admin.lawyer.delete', $lawyer->id) }}" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>

                @if(!$lawyer->approved)
                <form method="POST" action="{{ route('admin.lawyer.approve', $lawyer->id) }}" class="d-inline">
                    @csrf
                    <button class="btn btn-success btn-sm">Approve</button>
                </form>
                @endif
            </td>
            <td>
                @if($lawyer->certificate)
                    <a href="{{ asset('storage/' . $lawyer->certificate) }}" target="_blank" class="btn btn-info btn-sm">View Certificate</a>
                @else
                    N/A
                @endif            
        </tr>
        @endforeach
    </tbody>
</table>

@endsection