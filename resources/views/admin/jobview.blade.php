<x-layout>

<div class="container">
<nav class="row">
    <div class="d-flex justify-content-between ">
            
            <h1 class="text-secondary">Jop Post</h1>
            <div class="d-flex justify-content-between ">
            <div class="mt-2 me-2">
            <button 
                type="button" 
                class="btn btn-primary p-2 text-center rounded-3" 
                data-bs-toggle="modal" 
                data-bs-target="#formModal">
                Edit Post
            </button>
            </div>

            <div class="mt-2">
                <form id="deleteForm" action="/admin/job/{{$job->id}}" method="post" style="display: inline;">
                    @method('DELETE')
                    @csrf
                    <button type="button" class="btn btn-danger p-2  delete-button" data-bs-toggle="modal" data-bs-target="#confirmationModal">
                    <i class="bi bi-trash3 text-light "></i>
                </button>
                </form>
            </div>


            <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmationModalLabel">Confirm Deletion</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this job post? This action cannot be undone.
                        </div>
                        <div class="modal-footer">
                            <!-- Cancel Button -->
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <!-- Confirm Deletion Button -->
                            <button type="submit" form="deleteForm" class="btn btn-danger">Yes, Delete</button>
                        </div>
                    </div>
                </div>
            </div>



            </div>

            <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header ">
                            <h5 class="modal-title text-secondary" id="formModalLabel">Edit Post</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>





                        <div class="modal-body">
                            <form  action="/admin/editjob" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <input type="hidden" name="id" value="{{ $job->id }}">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="title">Title</label>
                                            <input type="text" name="title" id="title" autofocus class="form-control form-control-lg" value="{{ $job->title }}" required />
                    
                                            @error('title')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                 
                                </div>

             

                                <div class="row">
                                    <div class="col mb-3 pb-2">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="description">Description</label>
                                            <input type="text" id="description" name="description" required class="form-control form-control-lg" value="{{ $job->description }}" />
                                            
                                            @error('description')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">
                                        <div data-mdb-input-init class="form-outline">
                                            <div class="form-group">
                                                    <label for="type" class="form-label">Type</label>
                                                    <select class="form-select" id="type" name="type" required>
                                                        <option  value="" disabled selected>offer type</option>
                                                        <option name="type" value="job" {{ $job->type== 'job' ? 'selected' : '' }}>job</option>
                                                        <option name="type" value="training" {{ $job->type== 'training' ? 'selected' : '' }}>training</option>
                                                        <option name="type" value="part-time" {{ $job->type== 'part-time' ? 'selected' : '' }}>part-time</option>" 
                                                    </select>
                                            </div>
                                        </div>
                                    
                                            @error('type')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    <div class="col-md-6 mb-3  pb-2">
                                        <div data-mdb-input-init class="form-outline">
                                            <div class="form-group">
                                                <label for="location">Location</label>
                                                <input id="location" type="text"  name="location" value="{{ $job->location }}" class="form-control">
                                            </div>
                                            @error('location')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3 pb-2">
                                        <div data-mdb-input-init class="form-outline">
                                            <label for="salary" class="form-label">Salary</label>
                                            <input type="number" name="salary" value="{{ $job->salary }}" class="form-control form-control-lg" id="salary" placeholder="Enter salary" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3 pb-2">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="duration">Duration</label>
                                            <input type="text" name="duration" id="duration" required class="form-control form-control-lg" value="{{ $job->duration }}" placeholder="Enter job duration" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                <div class="col-md-6 mb-3 pb-2 ">
                                        <div data-mdb-input-init class="form-outline">
                                            <div class="form-group">
                                                <label for="status">Opean</label>
                                               <input type="radio" name="status" value="open"  class="form-check-input" {{ $job->status === 'open' ? 'checked' : ''}}> 
                                               <label for="status">Closed</label>
                                               <input type="radio" name="status" value="closed"  class="form-check-input" {{ $job->status === 'closed' ? 'checked' : ''}}> 
                                            </div>    
                                        </div>
                                      </div>
                                </div>
                           

                               

                                <div class=" pt-2 text-center">
                                    <button class="btn btn-primary btn-lg w-100" type="submit">Edit Post</button>
                                </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
             </div>                       
        </div>
    </nav>
    <hr>

    <hr>







<div class="row">
        <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img class="rounded-circle" src="{{asset($job->company->img)}}" style="width:150px ; height:150px; " alt="">
                        <h5 class="my-3">{{$job->company->name}}</h5>
                        <p class="text-muted mb-1">{{$job->company->category}}</p>
                        <p class="text-muted mb-2">Address: {{$job->company->address}}</p>
                    </div>
                </div>

        </div>

      <div class="col-lg-8">
         <div class="card mb-4">
          <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 d-flex justify-content-between">
                        <h3 class="mb-0 text-muted">{{$job->title}}</h3>
                        <h5 class="mb-0 text-muted align-content-center me-4 " >type: {{$job->type}}</h5>
                    </div>
                </div>
            <hr>
            <div class="row">
              <div class="col-sm-12">
                <h5 class="mb-0 text-muted">Descreption:</h5>
                 <p class>{{$job->description}}</p>
              </div>
            </div>
            <hr>
            <div class="row ">
              <div class="col-sm-12">
                <h6 class="mb-0 text-muted">{{"Location: ".$job->location}}</h6>
                <hr>
                <h6 class="mb-0 text-muted">{{"Duration: ".$job->duration}}</h6>
                <hr>
                @if ($job->status === 'open')
                    <h6 class="text-success">{{"Status: ".$job->status}}</h6>
                 @else
                    <h6 class="text-danger">{{"Status: ".$job->status}}</h6>                
                @endif
                <hr>
                <h6 class="mb-0 text-success">{{"Salary: ". number_format($job->salary, 0) . " JOD" }}</h6> 
            </div>


          
            

</div>
</x-layout>