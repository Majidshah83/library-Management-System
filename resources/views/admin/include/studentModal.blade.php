
<div class="modal fade" id="{{'studentupdateform' . $data->id }}" tabindex="-1"
                              role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header border-bottom-0">
                                       <p class="modal-title" id="exampleModalLabel"
                                          style="font-size: 29px; font-weight: bold;">
                                          Update Student
                                       </p>
                                       <button type="button" class="close" data-dismiss="modal"
                                          aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <form action="/studentupdate/{{$data->id}}" method="POST">
                                       @csrf
                                       <div class="modal-body">
                                          <div class="form-group">
                                            <input type="hidden" value={{$data->id}} name="id">
                                             <label for="name">Student name</label>
                                             <input type="text" class="form-control" id="name" name="name"
                                                aria-describedby="titleHelp" placeholder="Enter name" value="{{$data->name}}">
                                          </div>
                                          <div class="form-group">
                                             <label for="regno">Student RegNo</label>
                                             <input type="text" class="form-control" id="regno" name="regno"
                                                placeholder="Enter RegNo" value="{{$data->regno}}">
                                          </div>
                                          <div class="form-group">
                                             <label for="date_of_issue">Issue_Date</label>
                                             <input type="date" id="date_of_issue" name="date_of_issue" class="form-control" value="{{$data->date_of_issue}}">
                                          </div>
                                          <div class="form-group">
                                             <label for="date_of_return">Return_Date</label>
                                             <input type="date" class="form-control" id="date_of_return" name="date_of_return" value="{{$data->date_of_return}}">
                                          </div>
                                          <div class="form-group">
                                             <label for="course">Course</label>
                                             <input type="text" class="form-control" id="course" name="course"
                                                placeholder="Enter course" value="{{$data->course}}">
                                          </div>
                                          <div class="form-group">
                                             <label for="department">Department</label>
                                             <input type="text" class="form-control" id="department" name="department"
                                                placeholder="Enter course" value="{{$data->department}}">
                                          </div>
                                          <label for="gender">Gender</label> </br>
                                          <input type="radio" name="gender" value="Male" {{ $data->gender == 'Male' ? 'checked' : ''}}> Male
                                          <input type="radio" name="gender"value="Female" {{ $data->gender == 'Female' ? 'checked' : ''}}>Female
                                       </div>
                                       <div class="modal-footer border-top-0 d-flex justify-content-center">
                                          <button type="submit" class="btn btn-success">Update</button>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>