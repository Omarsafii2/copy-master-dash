<x-layout>
    <div class="container">
        <nav class="row">
            <div class="d-flex justify-content-between ">    
                <h1 class="text-secondary">Jobs</h1>



                





             </div>
            
        </nav>
    
    <hr>     

    <div class="row">
    <div class="mb-3">
    <div class="col-md-12">
                <form action="/admin/job" method="GET" id="jobSearchForm">
                    <div class="input-group">
                        <input type="text" name="search" id="jobSearch" class="form-control" placeholder="Search jobs..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>                 </div>
        <div class="col">
            <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col" class="text-secondary">Company</th>
                    <th scope="col" class="text-secondary">Title</th>
                    <th scope="col" class="text-secondary">Type</th>
                    <th scope="col" class="text-secondary">Location</th>
                    <th scope="col" class="text-secondary">Salary </th>
                    <th scope="col" class="text-secondary">Status</th>
                    <th scope="col" class="text-secondary">Action </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($jobs as $job)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div>
                                    <img src="{{asset($job->company->img)}}" alt="company Image" width="50px" height="50px" loading="lazy"  class="me-2 rounded-5">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-bold ">{{$job->company->name}}</h6>
                                    </div>
                                </div>   
                            </td>

                            <td class="align-middle">
                                <p class="text-secondary">{{$job->title}}</p>
                            </td>
                            <td class="align-middle">
                                <p class="text-secondary">{{$job->type}}</p>
                            </td>

                            <td class="align-middle">
                               <p class="text-secondary">{{$job->location}}</p>
                            </td>

                            <td class="align-middle ">
                                <p class="text-bold text-muted">{{number_format($job->min_salary) }}&nbsp; <i class="bi bi-arrow-right"></i> &nbsp;{{number_format($job->salary)." JOD"}}</p>
                            </td>

                            <td class="align-middle">
                                @if ($job->status === 'open')
                                    <p class="text-success">{{$job->status}}</p>
                                @else
                                    <p class="text-danger">{{$job->status}}</p>
                                @endif
                               
                            </td>


                            <td class="align-middle gap-2" >
    <!-- View Icon -->
                                <a href="{{url('admin/'.$job->id.'/jobview')}}" class="text-decoration-none">
                                    <i class="bi bi-eye me-2"></i>
                                </a>

                            

                             
                            </td>


                           
                        
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            <div class="pagination">
              {{ $jobs->links('pagination::bootstrap-4')}}
            </div>
        </div>
    </div>
    </div>

   
    
     
    
    




    </div>
</x-layout>