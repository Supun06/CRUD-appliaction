<div id="myenter" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">


        <div class="modal-content">

            <form action="" id="stu_form">

                <div class="modal-header">
                    <h5 class="modal-title">New Registration</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" id="" placeholder="Enter Name">
                        <div class="invalid-name text-danger clearErrorMessagesAddStudentFom"></div>
                    </div>

                    <div class="form-group">
                        <label for="">Age</label>
                        <input type="text" class="form-control" name="age" id="" placeholder="Enter Age">
                        <div class="invalid-age text-danger clearErrorMessagesAddStudentFom"></div>
                    </div>

                    <div class="form-group">
                        <label for="">Gender</label>
                        <select class="form-control" name="gender" id="">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <div class="invalid-gender text-danger clearErrorMessagesAddStudentFom"></div>
                    </div>

                    <div class="form-group">
                        <label for="">Date of birth</label>
                        <input class="form-control" type="date" name="dob">
                        <div class="invalid-dob text-danger clearErrorMessagesAddStudentFom"></div>
                    </div>

                    <div class="form-group">
                        <label for="">Address</label>
                        <textarea class="form-control" name="address" id="" cols="30" rows="5"
                            placeholder="Enter Address"></textarea>
                        <div class="invalid-address text-danger clearErrorMessagesAddStudentFom"></div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" name="stubtn" id="stubtn">Submit</button>
                        <button name="cancel" class="btn btn-danger" data-dismiss="modal"> Close</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>


<script>
$(document).on('click', '#stubtn', function(e) {
    resetAddStudentFormValidation();

    var data = $("#stu_form").serialize();


    $.ajax({
        data: data,
        type: "post",
        url: "<?php echo Yii::app()->baseUrl;?>/index.php?r=site/GetStudentSubmit",
        success: function(res) {
            var response = JSON.parse(res);
            if (response.status == "1") {
                $('#myenter').modal('hide');
                getStudent();
                location.reload();
            } else if (response.status == "0") {
                alert(response.msg);
            } else {
                alert(response.msg);
                showAddStudentFormValidation(response.errors);

            }
            


        }
        


    });
});

function resetAddStudentFormValidation() {
    $(".clearErrorMessagesAddStudentFom").html('');
    $(".clearErrorMessagesAddStudentFom").hide();
}


function showAddStudentFormValidation(errosData) {
    if (errosData.name != "") {
        $(".invalid-name").html(errosData.name);
        $(".invalid-name").show();
    }
    if (errosData.age != "") {
        $(".invalid-age").html(errosData.age);
        $(".invalid-age").show();
    }
    if (errosData.dob != "") {
        $(".invalid-dob ").html(errosData.dob);
        $(".invalid-dob").show();
    }
    if (errosData.address != "") {
        $(".invalid-address").html(errosData.address);
        $(".invalid-address").show();
    }
}
</script>