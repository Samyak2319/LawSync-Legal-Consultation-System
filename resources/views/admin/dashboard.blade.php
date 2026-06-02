@extends('layouts.admin')
@section('title', 'Admin Dashboard - LawSync')
@section('content')

<div class="container-fluid">

    <h2 class="mb-4">Admin Dashboard</h2>

    <!-- STATS CARDS -->
    <div class="row g-4">

        <div class="col-md-3">
            <div class="card-box bg-blue">
                <h6>Total Users</h6>
                <h3>{{ $totalUsers }}</h3>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-box bg-green">
                <h6>Total Lawyers</h6>
                <h3>{{ $totalLawyers }}</h3>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-box bg-yellow">
                <h6>Lawyer Approval Requests</h6>
                <h3>{{ $pendingLawyers }}</h3>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-box bg-red">
                <h6>Total Appointments</h6>
                <h3>{{ $totalBookings }}</h3>
            </div>
        </div>

    </div>
    

    <!-- CHARTS -->
    <div class="row mt-5 gy-4">

        <!-- Appointment Status Chart -->
        <div class="col-lg-6 col-md-12">
            <div class="card p-4 shadow-sm border-0 rounded-4 h-100">

                <h5 class="fw-bold mb-4">
                    Appointment Status Overview
                </h5>

                <div style="height: 420px;">
                    <canvas id="bookingChart"></canvas>
                </div>

            </div>
        </div>

        <!-- Platform Analytics Chart -->
        <div class="col-lg-6 col-md-12">
            <div class="card p-4 shadow-sm border-0 rounded-4 h-100">

                <h5 class="fw-bold mb-4">
                    Platform Analytics
                </h5>

                <div style="height: 420px;">
                    <canvas id="systemChart"></canvas>
                </div>

            </div>
        </div>
    </div>

</div>



<!-- CHART JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    // =========================
    // APPOINTMENT STATUS CHART
    // =========================

    const appointmentChart = new Chart(
        document.getElementById('bookingChart'),
        {
            type: 'doughnut',

            data: {
                labels: [
                    'Pending Appointments',
                    'Accepted Appointments',
                    'Rejected Appointments'
                ],

                datasets: [{
                    data: @json([
                        $bookingStats['pending'] ?? 0,
                        $bookingStats['accepted'] ?? 0,
                        $bookingStats['rejected'] ?? 0
                    ]),

                    backgroundColor: [
                        '#f59e0b',
                        '#10b981',
                        '#ef4444'
                    ],

                    borderWidth: 2,
                    borderColor: '#fff',
                    hoverOffset: 15
                }]
            },

            options: {
                responsive: true,
                maintainAspectRatio: false,

                plugins: {

                    legend: {
                        position: 'bottom',

                        labels: {
                            padding: 20,

                            font: {
                                size: 14,
                                weight: '600'
                            }
                        }
                    },

                    tooltip: {
                        backgroundColor: '#111827',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        padding: 12,
                        cornerRadius: 10
                    }
                },

                cutout: '65%'
            }
        }
    );



    // =========================
    // PLATFORM ANALYTICS CHART
    // =========================

    const systemChart = new Chart(
        document.getElementById('systemChart'),
        {
            type: 'bar',

            data: {
                labels: [
                    'Users',
                    'Lawyers',
                    'Appointments'
                ],

                datasets: [{
                    label: 'Platform Statistics',

                    data: @json([
                        $totalUsers,
                        $totalLawyers,
                        $totalBookings
                    ]),

                    backgroundColor: [
                        '#3b82f6',
                        '#10b981',
                        '#8b5cf6'
                    ],

                    borderRadius: 12,
                    barThickness: 60
                }]
            },

            options: {

                responsive: true,
                maintainAspectRatio: false,

                plugins: {

                    legend: {
                        display: false
                    },

                    tooltip: {
                        backgroundColor: '#111827',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        padding: 12,
                        cornerRadius: 10
                    }
                },

                scales: {

                    y: {
                        beginAtZero: true,

                        ticks: {
                            stepSize: 2
                        },

                        grid: {
                            color: '#e5e7eb'
                        }
                    },

                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        }
    );

});
</script>

@endsection