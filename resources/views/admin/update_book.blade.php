<form action="{{url('book-record-update')}}" method="POST">
    @csrf
    <div class="modal-body">
        <div class="form-group">
            <input type="hidden" name="id" value="{{$book->id}}">
            <label for="Title">Book Title</label>
            <input type="text" class="form-control" id="text1" name="title" aria-describedby="titleHelp"
                placeholder="Enter Title" value="{{$book->title}}">

        </div>
        <div class="form-group">
            <label for="pircebook">Book Price</label>
            <input type="text" class="form-control" id="pircebook" name="price" placeholder="Enter Price"
                value="{{$book->price}}">
        </div>
        <div class="form-group">
            <label for="auther">Book Auther</label>
            <input type="text" class="form-control" id="auther" name="auther" placeholder="Enter Auther Name"
                value="{{$book->auther}}">
        </div>
        <div class="form-group">
            <label for="bookedition">Book Edition</label>
            <input type="text" class="form-control" id="bookedition" placeholder="Enter Edition" name="edition"
                value="{{$book->edition}}">
        </div>
        <div class="form-group">
            <label for="categorybook">Book Category</label>
            <input type="text" class="form-control" id="categorybook" name="category" placeholder="Enter Category"
                value="{{$book->category}}">
        </div>
    </div>
    <d class="modal-footer border-top-0 d-flex justify-content-center">
        <button type="submit" class="btn btn-success">Submit</button>
    </d iv>
</form>
