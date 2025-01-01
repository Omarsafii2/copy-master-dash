<x-layout>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.min.css">

<div class="container">
    <nav class="row">
        <div class="d-flex justify-content-between ">
            
            <h1 class="text-secondary">Companies</h1>
        
           

        </div>
    </nav>
    <hr>    
    <!-- ************************************************* -->

    <div class="row">
                <div class="mb-3">
                <div class="col-md-12">
                <form action="/admin/company" method="GET" id="jobSearchForm">
                    <div class="input-group">
                        <input type="text" name="search" id="jobSearch" class="form-control" placeholder="Search jobs..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>                  </div>
        <div class="col">
            <div class="table-responsive" >
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col" class="text-secondary">Company</th>
                    <th scope="col" class="text-secondary">Email</th>
                    <th scope="col" class="text-secondary">Status </th>
                    <th scope="col" class="text-secondary">Subscription</th>
                    <th scope="col" class="text-secondary">Action </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($companies as $company )
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div>
                                    <img src="{{ asset($company->img) }}" alt="company Image" width="50px" height="50px" loading="lazy"  class="me-2 rounded-5">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-bold   ">{{$company['name']}}</h6>
                                    </div>
                                </div>   
                            </td>

                            <td class="align-middle">
                                  <a href="mailto:{{$company['email']}}" class="text-xs text-decoration-none text-secondary mb-0">{{$company['email']}}</>
                            </td>

                            <td class="align-middle">
                                @if ($company['is_active']==='active')
                                      <h6 class="text-success">active</h6>
                                 @else
                                      <h6 class="text-danger">inactive</h6>
                                @endif
                            </td>

                            <td class="align-middle ">
                                @if ($company['subscription_status']==='premium')
                                      <h6 class="text-success">premium</h6>
                                 @else
                                      <h6 class="text-danger">free</h6>
                                @endif
                            </td>

                            <td class="align-middle gap-2" >
    <!-- View Icon -->
                                <a href="{{url('admin/'.$company->id.'/companyprofile')}}" class="text-decoration-none">
                                    <i class="bi bi-eye me-2"></i>
                                </a>


    

                               


                             
                            </td>


                           
                        
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            <div class="pagination">
                {{ $companies->links('pagination::bootstrap-4')}}
            </div>
        </div>
    </div>
    
    
    </div>

   
</x-layout>