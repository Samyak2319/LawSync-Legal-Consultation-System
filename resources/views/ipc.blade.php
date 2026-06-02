@extends('layouts.app')

@section('content')
@section('title', 'Indian Penal Code Sections - Lawsync')

<div class="container mt-5 mb-5">

    <!-- PAGE HEADER -->
    <div class="text-center mb-5">
        <h1 class="fw-bold">📚 Indian Penal Code (IPC) Sections</h1>

        <p class="text-muted mt-3">
            Explore important IPC sections and understand common legal offences under Indian law.
        </p>
    </div>

    <!-- SEARCH BAR -->
    <div class="row justify-content-center mb-5">
        <div class="col-md-6">

            <input type="text"
                   id="ipcSearch"
                   class="form-control form-control-lg shadow-sm"
                   placeholder="Search IPC section...">

        </div>
    </div>

    <!-- IPC CARDS -->
    <div class="row g-4" id="ipcContainer">

        <!-- CARD -->
        <div class="col-md-6 ipc-card">
            <div class="card border-0 shadow-sm rounded-4 h-100 p-4">

                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="fw-bold text-primary">
                        IPC Section 302
                    </h4>

                    <span class="badge bg-danger">
                        Criminal
                    </span>
                </div>

                <h6 class="mt-3 fw-semibold">
                    Punishment for Murder
                </h6>

                <p class="text-muted mt-2">
                    Whoever commits murder shall be punished with death or imprisonment for life and shall also be liable to fine.
                </p>

            </div>
        </div>

        <!-- CARD -->
        <div class="col-md-6 ipc-card">
            <div class="card border-0 shadow-sm rounded-4 h-100 p-4">

                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="fw-bold text-primary">
                        IPC Section 376
                    </h4>

                    <span class="badge bg-warning text-dark">
                        Women Safety
                    </span>
                </div>

                <h6 class="mt-3 fw-semibold">
                    Punishment for Rape
                </h6>

                <p class="text-muted mt-2">
                    Provides punishment for rape offences with rigorous imprisonment and fine.
                </p>

            </div>
        </div>

        <!-- CARD -->
        <div class="col-md-6 ipc-card">
            <div class="card border-0 shadow-sm rounded-4 h-100 p-4">

                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="fw-bold text-primary">
                        IPC Section 420
                    </h4>

                    <span class="badge bg-info">
                        Fraud
                    </span>
                </div>

                <h6 class="mt-3 fw-semibold">
                    Cheating and Dishonestly Inducing Delivery of Property
                </h6>

                <p class="text-muted mt-2">
                    Punishment for cheating, fraud, and dishonest property transfer.
                </p>

            </div>
        </div>

        <!-- CARD -->
        <div class="col-md-6 ipc-card">
            <div class="card border-0 shadow-sm rounded-4 h-100 p-4">

                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="fw-bold text-primary">
                        IPC Section 498A
                    </h4>

                    <span class="badge bg-success">
                        Domestic Violence
                    </span>
                </div>

                <h6 class="mt-3 fw-semibold">
                    Cruelty by Husband or Relatives
                </h6>

                <p class="text-muted mt-2">
                    Protects married women from cruelty and domestic violence by husband or relatives.
                </p>

            </div>
        </div>

    </div>

</div>

<!-- SEARCH SCRIPT -->
<script>
    document.getElementById('ipcSearch').addEventListener('keyup', function () {

        let value = this.value.toLowerCase();

        document.querySelectorAll('.ipc-card').forEach(card => {

            card.style.display =
                card.innerText.toLowerCase().includes(value)
                ? 'block'
                : 'none';

        });

    });
</script>

@endsection