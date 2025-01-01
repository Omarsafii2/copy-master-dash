<x-layout>
    <div class="container">
        <nav class="row">
        <div class="d-flex justify-content-between ">
            
            <h1 class="text-secondary">Subscriptions</h1>
       


           

        </div>
        </nav>
        <hr>




        <div class="row">
        <div class="mb-3">
            <div class="col-md-12">
                    <form action="/admin/subsicriptions" method="GET" id="jobSearchForm">
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
                    <th scope="col" class="text-secondary">Status</th>
                    <th scope="col" class="text-secondary">Start Date</th>
                    <th scope="col" class="text-secondary">Action</th>
                    

               
                    </tr>
                </thead>

                <tbody>
                    @foreach ($subscriptions as $subscription)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-bold ">{{$subscription->name}}</h6>
                                    </div>
                                </div>   
                            </td>

                            <td>
                                <div class="d-flex px-2 py-1">
                                    
                                    <div class="d-flex flex-column justify-content-center">
                                        @if ($subscription->is_active === 'active')
                                            <h6 class="mb-0 text-bold text-success ">{{$subscription->is_active}}</h6>
                                        @else
                                            <h6 class="mb-0 text-bold text-danger ">{{$subscription->is_active}}</h6>       
                                        @endif

                                        
                                    </div>
                                </div>   
                            </td>

                            <td>
                                <div class="d-flex px-2 py-1">
                                    
                                    <div class="d-flex flex-column justify-content-center">
                                        <rt_ class="mb-0 text-bold ">{{$subscription->subscription_start_date}}</h6>
                                    </div>
                                </div>   
                            </td>

                            




                            

                            

                         



                            <td class="align-middle gap-2" >
    <!-- View Icon -->
                                <a href="{{url('admin/'.$subscription->id.'/companyprofile')}}" class="text-decoration-none">
                                    <i class="bi bi-eye me-2"></i>
                             </a>

                              


                        

                                    
                                    


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
    
</x-layout>
