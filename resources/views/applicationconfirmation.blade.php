@extends('layout.layout')

@section('title', 'Leave Confirmation')

@section('content')
<div class="container">
	<div class="row my-4">
        <h3 class="col-8">LEAVE CONFIRMATION</h3>
    </div>
	<div class="row my-4">
		<div class="col-md-12 pr-0">
			<div class="card">
				<div class="card-header">
					<span>LEAVE DETAILS</span>
				</div>
				<div class="list-group list-group-flush">
					{{--Leave Type--}}
					<div class="list-group-item d-flex justify-content-between">
						<span>Leave Type</span>
						<span>{{$details['leaveType']}}</span>
					</div>
					{{--Absent Period--}}
					<div class="list-group-item d-flex justify-content-between">
						<span>Absent Period</span>
						<span>{{$details['leavePeriod']}}</span>	
					</div>
					{{--Reason--}}
					<div class="list-group-item">
						<div>
							<span class="col p-0">Reasons</span>
						</div>
						<div>
							<p class="mt-1">{{$details['reason']}}</p>
						</div>
					</div>
					{{--Supporting Document--}}
					<div class="list-group-item">
						<div>
							<span class="col p-0">Supporting Documents</span>
						</div>
						<div>
							<ul class="mt-1 list-unstyled">
								<p class="mt-1"> 
								@foreach ($details['supportingDocuments'] as $documentDetails)
									<li><a href="{{$documentDetails['link']}}">{{$documentDetails['name']}}</a></li>
								@endforeach
								</p>
							</ul>
						</div>
					</div>
					{{--Affected Class--}}
					<div class="list-group-item">
						<div>
							<span class="col p-0">Affected Classes</span>
						</div>
						<div>
							<ul class="mt-1 list-unstyled">
								@foreach ($details['affectedClasses'] as $className)
									<li>{{$className}}</li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>		   
		</div>
	</div>
	<div class="row justify-content-between">
		<div class="col-md-1">
			<button type="button" class="btn btn-light" href="#">Back</button>
		</div>
		<div class="col-md-1">
			<button type="submit" class="btn btn-success" href="#">Confirm</button>
		</div>
	</div>
</div>
@endsection
