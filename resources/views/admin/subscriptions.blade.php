<x-layout>
    <div class="container">
        <nav class="row">
        <div class="d-flex justify-content-between ">
            
            <h1 class="text-secondary">Subscriptions</h1>
            <div class="mt-2">
                 <button type="button" class="btn btn-primary p-2" data-bs-toggle="modal" data-bs-target="#formModal"><i class="bi bi-plus-circle"></i> Add Subscription
    </button>
</div>

           

            <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
    
                        <div class="modal-header ">
                        <h5 class="modal-title text-secondary" id="formModalLabel">Add New Subscription</h5>

                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>



                        <div class="modal-body">
                            <form  action="/admin/addsubscription" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 mb-4">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="type">Subscription Type</label>
                                            <input type="text" name="type" id="type" autofocus class="form-control form-control-lg" required />
                    
                                        </div>
                                    </div>
                                 
                                </div>

                                

                                <div class="row">
                                    <div class="col mb-3 pb-2">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="price">Subscription Price</label>
                                            <input type="number" id="price" name="price" required class="form-control form-control-lg" />
                                            
                                            @error('email')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="duration">Duration <small>(day)</small></label>
                                            <input type="number" name="duration" id="duration" required class="form-control form-control-lg">
                                         
                                            
                                        </div>
                                    </div>
                                   
                                </div>

                                <div class="mt-4 pt-2 text-center">
                                    <button class="btn btn-primary btn-lg w-100" type="submit">Add</button>
                                </div>
                            </form>
                        </div>

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
                    <th scope="col" class="text-secondary">Type</th>
                    <th scope="col" class="text-secondary">Duration</th>
                    <th scope="col" class="text-secondary">Price</th>
                    <th scope="col" class="text-secondary">Subscriptions</th>
                    <th scope="col" class="text-secondary">Action</th>
               
                    </tr>
                </thead>

                <tbody>
                    @foreach ($subscriptions as $subscription)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-bold ">{{$subscription->type}}</h6>
                                    </div>
                                </div>   
                            </td>

                            <td class="align-middle">
                                <p class="text-secondary">{{$subscription->duration.' Days'}}</p>
                            </td>
                            <td class="align-middle">
                                <p class="text-secondary">{{$subscription->price.' JOD'}}</p>
                            </td>

                            <td class="align-middle ">
                               <p class="text-secondary ms-5">{{$subscription->companies_count}}</p>
                            </td>

                         



                            <td class="align-middle gap-2" >
    <!-- View Icon -->
                                <a href="{{url('admin/'.$subscription->id.'/subscriptionview')}}" class="text-decoration-none">
                                    <i class="bi bi-eye me-2"></i>
                                </a>

                              


                                <form id="deleteForm" class="mt-2 " action="/admin/subscription/{{$subscription->id}}" method="post" style="display: inline;">
                                        @method('DELETE')
                                        @csrf
                                    

                                        <button type="button" class="btn  p-2  delete-button" data-bs-toggle="modal" data-bs-target="#confirmationModal">
                                            <i class="bi bi-trash3 text-danger "></i>
                                        </button>
                                    </form>

                                    
                                    


                                <!-- Modal for Confirmation -->
                                <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="confirmationModalLabel">Confirm Deletion</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this company? This action cannot be undone.
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

                             
                            </td>


                           
                        
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            <div class="pagination">
              {{ $subscriptions->links('pagination::bootstrap-4')}}
            </div>
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
</x-layout>
