<?php require('updatelist.php'); ?>
<?php require('addNew.php'); ?>

<button type="button" class="btn btn-info my-3" data-toggle="modal" data-target="#myenter">Registration</button>


<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Age</th>
            <th scope="col">Gender</th>
            <th scope="col">Date Of Birth</th>
            <th scope="col">Address</th>
            
            <th scope="col" >Operations</th>

        </tr>
    </thead>
    <tbody>
        <?php
        foreach($studentVal as $value){

            ?>
        <tr>

        <th scope="row"><?php echo $value->id; ?></th>
            <td><?php echo $value->name; ?></td>
            <td><?php echo $value->age; ?></td>
            <td><?php echo $value->gender; ?></td>
            <td><?php echo $value->dob; ?></td>
            <td><?php echo $value->address; ?></td>

            <td>
                <button type="button" name="update" class="update btn btn-success" data-toggle="modal" data-target="#stuUp"
                    d_id="<?php echo $value->id; ?>" 
                    d_name="<?php echo $value->name; ?>"
                    d_age="<?php echo $value->age; ?>"
                    d_gender="<?php echo $value->gender; ?>"
                    d_dob="<?php echo $value->dob; ?>"
                    d_address="<?php echo $value->address; ?>">Update</button>

                <input type="hidden" id="stuDel" name="id">
                <button name="delete" id="delete" class="btn btn-danger"
                    d_id="<?php echo $value->id; ?>">Detele</button>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<script>
$(document).on("click", "#delete", function() {
    var id = $(this).attr("d_id");
    $('#stuDel').val(id);

});

$(document).on("click", "#delete", function() {
    var data = $("#stuDel").serialize();
    $.ajax({
        url: "<?php echo Yii::app()->baseUrl;?>/index.php?r=site/GetDelete",
        type: "POST",
        cache: false,
        data: {

            id: $("#stuDel").val()
        },
        success: function(datas) {
            $(datas).remove();
            getStudent();
        }
    });
});


$(document).on('click', '.update', function(e) {
    var id = $(this).attr("d_id");
    var name = $(this).attr("d_name");
    var age = $(this).attr("d_age");
    var gender = $(this).attr("d_gender");
    var dob = $(this).attr("d_dob");
    var address = $(this).attr("d_address");

    $('#id').val(id);
    $('#name').val(name);
    $('#age').val(age);
    $('#gender').val(gender);
    $('#dob').val(dob);
    $('#address').val(address);
});
</script>