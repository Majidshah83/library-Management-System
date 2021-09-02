
         <form action="{{url('return-book-data')}}" method="POST">
            @csrf
            <div class="modal-body">
                @if(count($errors)>0)
                @foreach ($errors->all() as $errors)
                <p class="alert alert-danger">{{$errors}}</p>
                @endforeach
                @endif
                @if(session('message'))
                <div class="alert alert-success">
                    <strong>{{session('message')}}</strong>
                </div>
                @endif
                <h1 class="title">Return Book</h1>
                <div class="form-group">
                    <input type="hidden" name="id" value="{{$bookissue->id}}">
                    <label for="name">Select Student:</label>
                        @foreach($students as $student)
                        @if($student->id==$bookissue->issuedBy_Id)
                      <input type="text" class="form-control" name="name" value=" {{$student->name}}" readonly>
                        @endif
                        @endforeach
                </div>
                <div class="form-group">
                    <label for="title">Select Book:</label>
                        @foreach($books as $book)
                        @if($book->id == $bookissue->book_Id)
                          <input type="text" class="form-control" name="title" value=" {{$book->title}}" readonly>
                            @endif
                        @endforeach
                </div>
                <div class="form-group">
                    <label for="issues_date">Issue Date</label>
                    <input type="date" class="form-control" id="issues_date" name="issues_date" value="{{$bookissue->issues_date}}" readonly>
                </div>
            <div class="form-group">
            <input type="hidden" class="form-control" id="staffDetail" placeholder="Enter Edition" name="staffDetail"
                value="{{$bookissue->staffDetail}}">
        </div>
                <div class="form-group">
                    <label for="return_date">Return Date</label>
                    <input type="date" class="form-control" id="return_date" name="return_date" value="{{$bookissue->return_date}}" readonly>
                </div>
                <div class="form-group">
                    <label for="return_date">Return On</label>
                    <input type="date" class="form-control" id="return_on" name="return_on" value={{ $bookissue->return_on}}">
                </div>
                   <div class="form-group">
                    <input type="hidden" class="form-control" id="fine" name="fine"  @foreach ($fines as $data) value="{{$data->fine}}"@endforeach readonly>
                </div>
                <div class="form-group">
           
                @if($bookissue->return_date<Carbon\Carbon::today()) 
                <label for="issuedBy_Id">Fine:</label>
                      <input type="text" class="form-control" name="receivefine" "id="receivefine" 
                      @foreach($fines as $fine)
                      value=" {{date_diff(\Carbon\Carbon::now(), new \DateTime($bookissue->return_date))->format("%a")*($fine->fine)}}"@endforeach>
                        @endif

                </div>
                <div class="modal-footer border-top-0 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Return Book</button>
                </div>
        </form>
