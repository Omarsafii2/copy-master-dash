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
                                <div class="col-md-6 mb-3 pb-2 ">
                                        <div data-mdb-input-init class="form-outline">
                                            <div class="form-group">
                                                <label for="status">Open</label>
                                               <input type="radio" name="status" value="open"  class="form-check-input" {{ $job->status === 'open' ? 'checked' : ''}}> 
                                               <label for="status">Close</label>
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
              <div class="col-sm-3 pb-2">
                <p class="mb-0">Category</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$job->category}}</p>
              </div>
            </div>
            <hr>
        



            <div class="row">
              <div class="col-sm-3 pb-2">
                <p class="mb-0">Category</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$job->description}}</p>
              </div>
            </div>
            <hr>


           

            <div class="row">
              <div class="col-sm-3 pb-2">
                <p class="mb-0">Location</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$job->location}}</p>
              </div>
            </div>
            <hr>

            




            <div class="row">
              <div class="col-sm-3 pb-2">
                <p class="mb-0">Duration</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$job->duration}}</p>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3 pb-2">
                <p class="mb-0">Status</p>
              </div>
              <div class="col-sm-9">
                @if ($job->status === 'open')
                    <p class="text-success mb-0">{{$job->status}}</p>
                @else
                    <p class="text-danger mb-0">{{$job->status}}</p>  
                @endif      
              </div>
            </div>
            <hr>

               


                
            <div class="row">
              <div class="col-sm-3 pb-2">
                <p class="mb-0 ">Salary</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0 fs-4">{{number_format($job->min_salary, 0)  }} &nbsp;<i class="bi bi-arrow-right"></i> &nbsp;{{number_format($job->salary, 0) ." JOD" }}</p>
              </div>
            </div>
            </div>


          
            

</div>
</x-layout>