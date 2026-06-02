<h3>{{ $lawyer->user->name }}</h3>

<p><strong>Specialization:</strong> {{ $lawyer->specialization }}</p>
<p><strong>Experience:</strong> {{ $lawyer->experience }}</p>
<p><strong>Location:</strong> {{ $lawyer->location }}</p>
<p><strong>Fee:</strong> ₹{{ $lawyer->fee }}</p>

<hr>

<h5>Certificate</h5>
<a href="{{ asset('storage/' . $lawyer->certificate) }}" target="_blank" class="btn btn-primary">
    View Certificate
</a>

<hr>

<form method="POST" action="{{ route('admin.lawyer.approve', $lawyer->id) }}">
    @csrf
    <button class="btn btn-success">Approve</button>
</form>