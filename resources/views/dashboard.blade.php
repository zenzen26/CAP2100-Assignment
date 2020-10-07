@extends('layout.layout')

@section('title', 'Dashboard')

@section('head')
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.3.2/main.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.3.2/main.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css" rel="stylesheet" />
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            themeSystem: 'bootstrap',
            events: [
                {
                    title  : 'SL12345',
                    start  : '2020-10-15',
                    backgroundColor: '#DC3545',
                    borderColor: '#DC3545'
                },
                {
                    title  : 'SL12345',
                    start  : '2020-10-05',
                    end    : '2020-10-10',
                    backgroundColor: '#FFC107',
                    borderColor: '#FFC107',
                    textColor: 'black'
                },
                {
                    title  : 'SL12345',
                    start  : '2020-10-08T12:30:00',
                    backgroundColor: '#28A745',
                    borderColor: '#28A745',
                    allDay : false
                },
                {
                    title  : 'SL12345',
                    start  : '2020-10-20',
                    backgroundColor: '#28A745',
                    borderColor: '#28A745'
                }
            ]
        });
        calendar.render();
        });
    </script>
    <style>
        .fc th {
            background-color: #DC3545;
            color: #FFFFFF;
        }
        @media (min-width: 576px) { 
            .fc th {
                padding: .3rem;
            }
         }
         @media (min-width: 768px) { 
            .fc th {
                padding: .75rem;
            }
        }
    </style>
@endsection

@section('content')

<div class="container">
    <div class="row my-4">
        <h3 class="col">DASHBOARD</h3>
    </div>
    <div class="row my-4">
        @isset($newUpdates)
        <div class="col-md-4">
            <table class="table table-bordered table-hover">
                <thead class="bg-danger text-light">
                    <tr>
                        <th>Updates</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($newUpdates as $newUpdate)
                    <tr>
                        <td>{{$newUpdate['update']}}<br>(ID: {{$newUpdate['leaveId']}})</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endisset
        @isset($approvalStatuses)
        <div class="col">
            <table class="table border-right border-left border-bottom table-hover">
                <thead class="bg-danger text-light">
                    <tr>
                        <th>COURSE</th>
                        <th class="text-center">LEAVE ID</th>
                        <th class="text-center">APPROVAL STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($approvalStatuses as $approvalStatus)
                    <tr>
                        <td>{{$approvalStatus['course']}}</td>
                        <td class="text-center">{{$approvalStatus['leaveId']}}</td>
                        <td class="text-{{$approvalStatus['status'] == 'APPROVED' ? 'success' : ($approvalStatus['status'] == 'REJECTED' ? 'danger' : 'warning') }} text-center
                        ">{{$approvalStatus['status']}}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3">There are no approval status</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @endisset
    </div>
    <div class="row my-5">
        <div class="col" id='calendar'></div>
    </div>
</div>
@endsection