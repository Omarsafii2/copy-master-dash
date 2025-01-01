<x-layout>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.min.css">

<div class="container">
    <!-- Navbar with Search Input -->
    <nav class="row mb-3">
        <div class="d-flex justify-content-between align-items-center">
            <!-- Title -->
            <h1 class="text-secondary col-12 col-md-auto mb-2 mb-md-0">Contacts</h1>

            <!-- Search Input -->
         
        </div>
    </nav>

    <!-- Horizontal Line -->
    <hr>

    <!-- Contacts Table -->
    <div class="row">
    <div class="mb-3">
    <div class="col-md-12">
                <form action="/admin/contact" method="GET" id="jobSearchForm">
                    <div class="input-group">
                        <input type="text" name="search" id="jobSearch" class="form-control" placeholder="Search jobs..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>               </div>
        <div class="col-12">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-secondary">Name</th>
                        <th scope="col" class="text-secondary">Email</th>
                        <th scope="col" class="text-secondary">Subject</th>
                        <th scope="col" class="text-secondary">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($contacts as $contact)
                    @if ($contact->reply == null)

                    <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-bold">{{$contact->name}}</h6>
                                    </div>
                                </div>   
                            </td>

                            <td class="align-middle">
                                <a href="mailto:{{$contact->email}}" class="text-xs text-decoration-none text-secondary mb-0">{{$contact->email}}</a>
                            </td>

                            <td class="align-middle">
                                <h6 class="mub-0 text-muted">{{$contact->subject}}</h6>
                            </td>

                            <td class="align-middle gap-2">
                                <!-- View Icon -->
                                <a href="{{url('admin/'.$contact->id.'/contactview')}}" class="text-decoration-none">
                                    <i class="bi bi-eye me-2"></i>
                                </a>
                                <button class="btn btn-danger btn-sm disabled"">Waiting</button>
                            </td>
                        </tr>

                    @else

                    <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-bold">{{$contact->name}}</h6>
                                    </div>
                                </div>   
                            </td>

                            <td class="align-middle">
                                <a href="mailto:{{$contact->email}}" class="text-xs text-decoration-none text-secondary mb-0">{{$contact->email}}</a>
                            </td>

                            <td class="align-middle">
                                <h6 class="mub-0 text-muted">{{$contact->subject}}</h6>
                            </td>

                            <td class="align-middle gap-2">
                                <!-- View Icon -->
                                <a href="{{url('admin/'.$contact->id.'/contactview')}}" class="text-decoration-none">
                                    <i class="bi bi-eye me-2"></i>
                                </a>
                                <button class="btn btn-success btn-sm disabled"">Replied</button>
                            </td>
                        </tr>



                    
                    @endif
                        
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="pagination">
                {{ $contacts->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

<!-- Search Script -->


</x-layout>
