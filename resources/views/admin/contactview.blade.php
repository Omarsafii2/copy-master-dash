<x-layout>
<div class="container">
    <nav class="row">
        <div class="d-flex justify-content-between">
            <h1 class="text-secondary">{{ "Subject: ".$contact->subject }}</h1>
        </div>
    </nav>
    <hr>

    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-body @if($contact->reply) border border-success p-3 @endif"> <!-- Add border around the entire body -->
                    <div class="row">
                        <div class="col-sm-12 d-flex justify-content-between">
                            <h3 class="mb-0 text-muted">{{ $contact->name }}</h3>
                            @if(!$contact->reply)
                                <a href="javascript:void(0);" onclick="showReplyForm()" class="text-decoration-none border bg-success text-white px-3 py-1 mb-0 rounded" id="replyButton">Reply</a>
                            @else
                                <span class=" text-decoration-none border bg-secondary text-white px-3 py-1 mb-0 rounded disabled">Replied</span>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h5 class="mb-0 text-muted">Message:</h5>
                            <p id="messageContent" class="ms-4 mt-3">{{ $contact->message }}</p>
                        </div>
                    </div>

                    @if(!$contact->reply)
                        <form id="replyForm" action="{{ route('admin.contact.reply', $contact->id) }}" method="POST" style="display:none;">
                            @csrf
                            <div class="mb-3">
                                <label for="reply" class="form-label">Reply</label>
                                <textarea class="form-control" id="reply" name="reply" rows="4" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Send Reply</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function showReplyForm() {
        document.getElementById("replyButton").style.display = "none";
        document.getElementById("replyForm").style.display = "block";
    }
</script>

</x-layout>
