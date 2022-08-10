<div id="stuUp" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">


        <div class="modal-content">

            <form action="" id="upForm">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" value="" name="id" id="id">
                    </div>

                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" value="" name="name" id="name">
                        <div class="invalid-name text-danger clearErrorMessagesAddStudentFom"></div>
                    </div>

                    <div class="form-group">
                        <label for="">Age</label>
                        <input type="text" class="form-control" name="age" id="age">
                        <div class="invalid-age text-danger clearErrorMessagesAddStudentFom"></div>
                    </div>

                    <div class="form-group">
                        <label for="">Gender</label>
                        <select type="text" class="form-control" name="gender" id="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <div class="invalid-gender text-danger clearErrorMessagesAddStudentFom"></div>
                    </div>

                    <div class="form-group">
                        <label for="">Date of birth</label>
                        <input type="date" class="form-control" name="dob" id="dob">
                        <div class="invalid-dob text-danger clearErrorMessagesAddStudentFom"></div>
                    </div>

                    <div class="form-group">
                        <label for="">Address</label></td>
                        <textarea name="address" class="form-control" id="address" cols="30" rows="5"></textarea>
                        <div class="invalid-address text-danger clearErrorMessagesAddStudentFom"></div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" name="stu_update" class="btn btn-dark" id="stu_update"> Update</button>
                        <button name="close" class="btn btn-danger" data-dismiss="modal">Close</button>

                    </div>




                </div>

            </form>
        </div>

    </div>
</div>


<script>

$(document).on('click', '#stu_update', function(e) {
    var data = $("#upForm").serialize();
    $.ajax({
        data: data,
        type: "post",
        url: "<?php echo Yii::app()->baseUrl;?>/index.php?r=site/GetUpdate",

        success: function(res) {
            var response = JSON.parse(res);
            if (response.status == "1") {
                $('#stuUp').modal('hide');
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
</script>