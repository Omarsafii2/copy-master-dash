<x-layout>

<div class="container">
<nav class="row">
    <div class="d-flex justify-content-between ">
            
            <h1 class="text-secondary">{{$subscriptions->type." Subscriptions"}}</h1>
           
              
        
    </div>
</nav>
<hr>

@foreach ($subscriptions->companies as $subscription )
<div class="row">
        <div class="col">
            <div class="table-responsive">

            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col" class="text-secondary">Name</th>
                    <th scope="col" class="text-secondary">Start Date</th>
                    <th scope="col" class="text-secondary">End Date</th>
                 
               
                    </tr>
                </thead>

                <tbody>
                    @foreach ($subscriptions->companies as $subscription)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-bold ">{{$subscription->name}}</h6>
                                    </div>
                                </div>   
                            </td>

                            <td class="align-middle">
                                <p class="text-secondary">{{$subscription->subscription_start_date}}</p>
                            </td>
                            <td class="align-middle">
                                <p class="text-secondary">{{ $subscription->subscription_end_date }}</p>
                            </td>

                           


                           
                        
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>

 

@endforeach

</div>
</x-layout>



