<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Development Test</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="scripts.js"></script>
</head>
<body class="text-sm" style="background-color: #ddd">
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Feedback Survey Form</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <form id="feedbackForm" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name:</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="age" class="form-label">Age:</label>
                                    <input type="number" class="form-control" id="age" name="age">
                                </div>
                                <div class="mb-3">
                                    <label for="document" class="form-label">Document:</label>
                                    <input type="file" class="form-control" id="document" name="document">
                                </div>
                                <div class="mb-3">
                                    <label for="feedback_type" class="form-label">Type of Feedback:</label>
                                    <select class="form-control" id="feedback_type" name="feedback_type">
                                        <option value="Positive">Positive</option>
                                        <option value="Negative">Negative</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Services Used:</label><br>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="services_used[]" value="Service 1" id="service1">
                                        <label class="form-check-label" for="service1">Service 1</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="services_used[]" value="Service 2" id="service2">
                                        <label class="form-check-label" for="service2">Service 2</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="services_used[]" value="Service 3" id="service3">
                                        <label class="form-check-label" for="service3">Service 3</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="comments" class="form-label">Additional Comments:</label>
                                    <textarea class="form-control" id="comments" name="comments"></textarea>
                                </div>
                                <input type="hidden" id="id" name="id" class="form-control" value="">
                                <button type="submit" id="btnSubmit" name="create" class="btn btn-success btn-block">Submit Feedback</button>
                                <button type="submit" id="btnUpdate" name="update" class="btn btn-success btn-block d-none" >Update Feedback</button>
                                <button type="button" id="btnCancel" onclick="fnCancel()" class="btn btn-block d-none" >Cancel</button>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 pt-3">
                            <div id="viewSurvey"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>