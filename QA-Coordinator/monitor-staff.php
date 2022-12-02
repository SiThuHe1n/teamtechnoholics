<?php include ('qaC-header.php');?>
<br>
    <div class="container mt-4">
        <div class="row">

            <div class="col-md-10 mx-auto">
                <div class="row mx-1 mb-4 border-bottom pb-3 border-secondary">
                    <div class="col-xs-8">
                        <h2 class="page-header">Users<small style="font-size:large"> Management</small></h2>
                    </div>
                  
                </div>
                <div class="card rounded-0">
                    <div class="card-header p-2 mb-3">
                        <h5 class="card-title font-weight-normal">All staffs</h5>
                    </div>
                    <div class="card-body">


                        <form action="">
                            <div class="form-group row mx-auto">
                                <div class="col-md-7 mb-2">
                                    <div class="form-inline">
                                        <label for="userFilter">Filter by : &nbsp;</label>
                                        <div class="input-group">
                                            <select class="form-control rounded-0 form-control-sm">
                                                <option value="">All</option>
                                                <option value="">Submitted Users</option>
                                                <option value="">Unsubmitted Users</option>
                                            </select>
                                            <div class="input-group-append">
                                                <button class="btn btn-sm btn-outline-dark rounded-0 px-1" type="button">Apply</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5"> 
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control form-control-sm rounded-0" placeholder="Search . . ." aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-success rounded-0 btn-sm"><i class="fa-solid fa-magnifying-glass"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <table class="table table-responsive-sm table-borderless table-hover text-center">
                            <thead class="">
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Submitted</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Aung</td>
                                    <td>aung@unitec.com</td>
                                    <td>09785143774</td>
                                    <td>
                                        <button type="button" class="btn btn-danger p-1" data-toggle="modal">
                                            False
                                        </button>
                                    </td>
                                    <td>Staff</td>
                                    <td>
                                    <button type="button" class="btn btn-outline-warning p-1" data-toggle="modal" data-target="#notifyModal">
                                            Notify
                                        </button>
                                        </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>jacob@unitec.com</td>
                                    <td>09795227319</td>
                                    <td>
                                        <button type="button" class="btn btn-success px-2 py-1" data-toggle="modal" data-target="#notifyModal">
                                            True
                                        </button>
                                    </td>
                                    <td>Staff</td>
                                    <td>                                    
                                        <button type="button" class="btn btn-outline-warning p-1" data-toggle="modal" data-target="#notifyModal">
                                            Notify
                                        </button></td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>larry@unitec.com</td>
                                    <td>09312637411</td>
                                    <td>
                                        <button type="button" class="btn btn-danger p-1" data-toggle="modal" data-target="#notifyModal">
                                            False
                                        </button>
                                    </td>
                                    <td>Staff</td>
                                    <td>
                                    <button type="button" class="btn btn-outline-warning p-1" data-toggle="modal" data-target="#notifyModal">
                                            Notify
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- create user Modal -->
    <div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content rounded-0">
                <div class="modal-header py-0 border-0">
                    <h3 class="modal-title mt-4 mx-auto font-weight-bold" id="createUserModalLabel"><span style="font-size: 35px;">C</span>reate <span style="font-size: 35px;">U</span>ser</h3>
                </div>

                <div class="modal-body">
                    <form id="createUserForm" action="">
                        <!-- One "tab" for each step in the form: -->
                        <div class="tab">
                            <div class="alert alert-danger warningLabel my-3" role="alert">
                                Form should not be empty
                            </div>
                            <div class="form-group mb-3">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">User's Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">User's Password</label>
                                <input type="password" name="Password" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="role">User's Role</label>
                                <select class="form-control" name="role">
                                    <option>Staff</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>

                        </div>
                        
                        <div class="tab">
                            <div class="alert alert-danger warningLabel my-3" role="alert">
                                Form should not be empty
                            </div>
                            <div class="form-group mb-3">
                                <label for="dob">User's Date of Birth</label>
                                <input type="date" name="dob" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="phoneNum">User's Phone Number</label>
                                <input type="text" name="phoneNum" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="gender">User's Gender</label>
                                <select class="form-control" name="gender">
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                        </div>
                        
                        <!-- Circles which indicates the steps of the form: -->
                        <div class="text-center mt-4">
                            <span class="step"></span>
                            <span class="step"></span>
                          </div>

                        <div style="overflow:auto;" class="mt-3">
                        <button type="button" class="btn btn-primary" style="float:left;"data-dismiss="modal" aria-label="Close">
                            Close
                        </button>
                        <div style="float:right;">
                            
                            <button type="button" id="prevBtn" class="btn btn-outline-info" onclick="nextPrev(-1)">Previous</button>
                            <button type="button" id="nextBtn" class="btn btn-info" onclick="nextPrev(1)">Next</button>
                          </div>
                        </div>
                        
                        
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- notify user Modal -->
    <div class="modal fade" id="notifyModal" tabindex="-1" aria-labelledby="notifyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-body p-4">
                <div class="row mx-1 mb-4 border-bottom pb-2 border-dark">
                    <div class="col-xs-8">
                        <br>
                        <h2 class="page-header">Notify user</h2>
                    </div>
                    <div class="col-xs-4 ml-auto">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>

                <div class="card rounded-0">
                    <div class="card-header p-2 mb-3">
                        <h6 class="card-title font-weight-normal mb-0">Form Fields</h6>
                    </div>
                    <div class="card-body">

                        <form action="">

                            <div class="form-group">
                                <label for="userid">Send email to :</label>
                                <select class="form-control form-control-sm rounded-0" name="userid">
                                    <option>Aung</option>
                                    <option>Khant</option>
                                    <option>Min</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="cc">CC</label>
                                <input type="email" name="cc" class="form-control form-control-sm rounded-0" aria-describedby="ccHelpText">
                                <small id="ccHelpText" class="form-text text-muted">
                                    Add your supervisor email in this form.
                                </small>
                            </div>

                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <input type="text" name="subject" class="form-control form-control-sm rounded-0">
                            </div>

                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea id="demo"></textarea>
                            </div>
                    </div>
                </div>
                
                    <button type="button" class="btn btn-primary mt-4 btn-block rounded-0">Send</button>
                </form>
            </div>
              
          </div>
        </div>
    </div>

    <!-- DELETE CONFRIM MODAL -->
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
            <div class="modal-body">
            <br>
                <h4 class="text-center border-bottom border-dark pb-2">Delete user</h4>
                <p class="text-center mb-3 border-bottom border-dark py-4">Are you sure you want to delete this user? <span class="text-danger">Once you delete the user, there is no going back.</span> Please be certain.</p>
                <div class="col-md-6 mx-auto text-center">
                    <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Cancel</button>
                    <a href="#" class="btn btn-danger">Delete</a>
                </div>
            </div>
            </div>
        </div>
    </div>


    
    
    
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js' integrity='sha512-cEgdeh0IWe1pUYypx4mYPjDxGB/tyIORwjxzKrnoxcif2ZxI7fw81pZWV0lGnPWLrfIHGA7qc964MnRjyCYmEQ==' crossorigin='anonymous'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/rrr9ywwcmgivj2altdsyamur2wt6sdp2g5r2x29uu63s33g9/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#demo',
            skin: 'oxide-dark',
            height : 400
        });


let currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
    // This function will display the specified tab of the form ...
    let x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    // ... and fix the Previous/Next buttons:
    if (n == 0) {
        document.getElementById("prevBtn").disabled= true;
    } else {
        document.getElementById("prevBtn").disabled = false;
    }
    if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Create";
    } else {
        document.getElementById("nextBtn").innerHTML = "Next";
    }
    // ... and run a function that displays the correct step indicator:
    fixStepIndicator(n)
}

function nextPrev(n) {
    // This function will figure out which tab to display
    let x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form... :
    if (currentTab >= x.length) {
        //...the form gets submitted:
        document.getElementById("createUserForm").submit();
        return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
}

function validateForm() {
    // This function deals with validation of the form fields
    let x, y, z, i, warningLabel, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    z = x[currentTab].getElementsByTagName("label");
    warningLabel = x[currentTab].getElementsByClassName("warningLabel");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
        // add an "invalid" class to the field:
        
            y[i].className += " is-invalid";
            z[i].style.color = "red";
            $(warningLabel).fadeIn(300);
            setTimeout(function(){
                $(y).removeClass(" is-invalid");
                $(z).css("color","black");
                $(warningLabel).fadeOut(300);
            }, 3000);
        // and set the current valid status to false:
        valid = false;
        }
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid == true) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
}

function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    let i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    x[n].className += " active";
}
    </script>
    <br><br>
<?php include("qaC-footer.php"); ?>