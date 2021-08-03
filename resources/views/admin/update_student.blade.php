<form action="{{url('student-record-update')}}" method="POST">
   @csrf
   <input type="hidden" name="id" value="{{$student->id}}">
   <div class="modal-body">
      <div class="form-group">
         <label for="Title">Student name</label>
         <input type="text" class="form-control" id="text1" name="name"
            aria-describedby="titleHelp" placeholder="Enter name" value="{{$student->name}}">
      </div>
      <div class="form-group">
         <label for="regno">Student RegNo</label>
         <input type="text" class="form-control" id="regno" name="regno"
            placeholder="Enter RegNo" value="{{$student->regno}}">
      </div>
      <div class="form-group">
         <label for="department">Department</label>
         <input type="text" class="form-control" id="department" name="department"
            placeholder="Enter course" value="{{$student->department}}">
      </div>
      <label for="department">Gender</label> </br>
      <input type="radio" name="gender" value="Male" id="male" @if($student->gender == 'Male') checked @endif> Male
      <input type="radio" name="gender" value="Female" id="female" @if($student->gender == 'Female') checked @endif> Female
   </div>
   <div class="modal-footer border-top-0 d-flex justify-content-center">
      <button type="submit" class="btn btn-success">Submit</button>
   </div>
</form>