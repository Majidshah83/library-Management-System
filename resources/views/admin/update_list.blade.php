
         <form action="{{url('book-record-list')}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$issue->id}}">
            <div class="modal-body">
                @if(count($errors)>0)
                @foreach ($errors->all() as $errors)
                <p class="alert alert-danger">{{$errors}}</p>
                @endforeach
                @endif
   
                @if(Session::has('message'))
                   <p class="alert">{{ Session::get('message') }}</p>
                @endif
                <h1 class="title">Issue Book</h1>
                <div class="form-group">
                    <label for="issuedBy_Id">Select Student:</label>
                    <select class="form-control" id="issuedBy_Id" name="issuedBy_Id">
                        @foreach($students as $student)
                        <option value="{{$student->id}}"@if($student->id == $issue->issuedBy_Id) selected @endif>{{$student->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="book_Id">Select Book:</label>
                    <select class="form-control" id="book_Id" name="book_Id">
                        @foreach($books as $book)
                        <option value="{{$book->id}} "@if($book->id == $issue->book_Id) selected @endif">{{$book->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="issues_date">Issue Date</label>
                    <input type="date" class="form-control" id="issues_date" name="issues_date" value="{{$issue->issues_date}}">
                </div>
                <div class="form-group">
                    <label for="return_date">Return Date</label>
                    <input type="date" class="form-control" id="return_date" name="return_date" value="{{$issue->return_date}}">
                </div>
                <div class="form-group">
                    <label for="staffDetail">Staff Detail</label>
                    <textarea class="form-control" id="staffDetail" name="staffDetail" rows="3" 
                    value="<div style=&quot;text-align: center; font-weight: bold;&quot;></div>">{{$issue->staffDetail}}</textarea>

                </div>
                <div class="modal-footer border-top-0 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
        </form>
