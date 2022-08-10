<script>


      function getStudent() {
        $.ajax({
            type: "GET",
            url: "<?php echo Yii::app()->baseUrl;?>/index.php?r=site/GetStudentVal",
            success: function (response) {
                $('#result').html('');
                $('#result').html(response);
            }
        });
    }
    $(document).ready(function () {
       getStudent();
    });
</script>
<div id="result"></div>