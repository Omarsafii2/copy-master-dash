<x-layout>
    <div class="container">
        <nav class="row">
            <div class="d-flex justify-content-between ">    
                <h1 class="text-secondary">Jobs</h1>



                
                <div class="mt-2 me-2">
    <button type="button" class="btn btn-primary p-2 d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#formModal">
        <i class="bi bi-plus-circle me-1"></i> Add Post
    </button>
</div>













                <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header ">
                            <h5 class="modal-title text-secondary" id="formModalLabel">Add Post</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>





                        <div class="modal-body">
                            <form  action="/admin/addjob" method="post" enctype="multipart/form-data">
                                @csrf
                               
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="title">Title</label>
                                            <input type="text" name="title" id="title" autofocus class="form-control form-control-lg"  required />
                    
                                            @error('title')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="company_id">Company Id</label>
                                            <input type="text" name="company_id" id="company_id" autofocus class="form-control form-control-lg"  required />
                    
                                            @error('company_id')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                 
                                </div>

             

                                <div class="row">
                                    <div class="col mb-3 pb-2">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="description">Description</label>
                                            <input type="text" id="description" name="description" required class="form-control form-control-lg"  />
                                            
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
                                                        <option name="type" value="job" >job</option>
                                                        <option name="type" value="training" >training</option>
                                                        <option name="type" value="part-time" >part-time</option>" 
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
                                                <input id="location" type="text"  name="location"  class="form-control">
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
                                            <input type="number" name="salary"  class="form-control form-control-lg" id="salary" placeholder="Enter salary" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3 pb-2">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="duration">Duration</label>
                                            <input type="text" name="duration" id="duration" required class="form-control form-control-lg" placeholder="Enter job duration" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                <div class="col-md-6 mb-3 pb-2 ">
                                        <div data-mdb-input-init class="form-outline">
                                            <div class="form-group">
                                                <label for="status">Opean</label>
                                               <input type="radio" name="status" value="open"  class="form-check-input" > 
                                               <label for="status">Closed</label>
                                               <input type="radio" name="status" value="closed"  class="form-check-input" > 
                                            </div>    
                                        </div>
                                      </div>
                                </div>
                           

                               

                                <div class=" pt-2 text-center">
                                    <button class="btn btn-primary btn-lg w-100" type="submit">Add Post</button>
                                </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
             </div>
            
        </nav>
    
    <hr>     

    <div class="row">
    <div class="mb-3">
              <input type="text" id="searchInput" class="form-control" placeholder="Search users..." />
            </div>
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
                                <p class="text-bold">{{$job->salary}}</p>
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

    <script>
        document.getElementById('searchInput').addEventListener('input', function() {
        const searchValue = this.value.toLowerCase();
        const rows = document.querySelectorAll('table tbody tr');

        rows.forEach(row => {
            const name = row.querySelector('td').innerText.toLowerCase();
            const phone = row.querySelector('td:nth-child(2)').innerText.toLowerCase();

            // Show or hide row based on search query
            if (name.includes(searchValue) || phone.includes(searchValue)) {
                row.style.display = '';  // Show row
            } else {
                row.style.display = 'none';  // Hide row
            }
        });
    });

    </script>
    
    
     
    
    




    </div>
</x-layout>