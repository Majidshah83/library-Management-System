
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
                    <strong>{{session('success')}}</strong>
                </div>
                @endif
                <h1 class="title">Issue Book</h1>
                <div class="form-group">
                    <label for="issuedBy_Id">Select Student:</label>
                    <select class="form-control" id="issuedBy_Id" name="issuedBy_Id">
                        @foreach($students as $student)
                        <option value="{{$student->id}}"@if($student->id ==$bookissue->issuedBy_Id) selected @endif>{{$student->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="book_Id">Select Book:</label>
                    <select class="form-control" id="book_Id" name="book_Id">
                        @foreach($books as $book)
                        <option value="{{$book->id}} "@if($book->id == $bookissue->book_Id) selected @endif">{{$book->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="issues_date">Issue Date</label>
                    <input type="date" class="form-control" id="issues_date" name="issues_date" value="{{$bookissue->issues_date}}" readonly>
                </div>
                <div class="form-group">
                    <label for="return_date">Return Date</label>
                    <input type="date" class="form-control" id="return_date" name="return_date" value="{{$bookissue->return_date}}" readonly>
                </div>
                <div class="form-group">
                    <label for="return_date">Return On</label>
                    <input type="date" class="form-control" id="return_date" name="return_on">
                </div>
                <div class="form-group">
                    <label for="return_date">Fine</label>
                    <input type="text" class="form-control" id="fine" name="fine">
                </div>
                
                <div class="modal-footer border-top-0 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Return Book</button>
                </div>
        </form>
