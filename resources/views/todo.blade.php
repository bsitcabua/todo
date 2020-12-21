<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>TODO Page</title>
</head>
<body>

    <div class="container">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-md-12">
                <div class="card px-3">
                    <div class="card-body">
                        <a href="/logout" class="btn btn-sm btn-primary float-right">Logout</a>
                        <h4 class="card-title">Hurdman Todo list </h4>
                        
                        <div class="form-row">
                            <div class="col-md-4 col-sm-12 mt-2">
                                <label class="my-1 mr-2">Todo name <b class="text-danger">*</b></label>
                                <input type="text" class="form-control input_control" name="name" id="name" placeholder="Todo name" required>
                            </div>
                            <div class="col-md-3 col-sm-12 mt-2">
                                <label class="my-1 mr-2">Deadline date <b class="text-danger">*</b></label>
                                <input type="date" class="form-control input_control" name="deadline_date" id="deadline_date" required>
                            </div>
                            <div class="col-md-3 col-sm-12 mt-2">
                                <label class="my-1 mr-2">Deadline time <b class="text-danger">*</b></label>
                                <input type="time" class="form-control input_control" name="deadline_time" id="deadline_time" required>
                            </div>
                            <div class="col-md-2 col-sm-12 mt-2">
                                <label class="my-1 mr-2" style="visibility: hidden">Add</label>
                                <button class="add btn btn-block btn-primary font-weight-bold todo-list-add-btn" id="btn_add_item">Add</button>
                            </div>
                             
                        </div>

                        <div class="table-responsive">
                            <table class="table mt-5">
                                <thead>
                                <tr>
                                    <th scope="col" style="width: 15%;"></th>
                                    <th scope="col" style="width: 50%;">Name</th>
                                    <th scope="col">Deadline</th>
                                    <th scope="col" class="text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody id="todo_items">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  

    @include('modals.delete_item')
    @include('modals.update_item')
    @include('modals.adding')
    

    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ url('assets/js/todo.js') }}"></script>
</body>
</html>