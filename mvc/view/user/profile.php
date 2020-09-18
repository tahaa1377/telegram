<div class="board" style="background: #33af93">

     <span class="cancel navBtn">
        <span class="icon- icon-cancel-circle" style="background: #f18a36"></span>
    </span>

    <form enctype="multipart/form-data" method="post" action="/telegram/submitEditProfile">

        <div>
            <img src="/telegram/<?=$userInformation['profileImage']?>" style="width: 100px;height: 100px">
        </div>
<div style="background-color: #33af93">
&nbsp;
</div>
        <div style="background-color: #33af93">
            <input value="<?=$userInformation['name']?>" name="edit_name">
        </div>

        <div style="background-color: #33af93">
            &nbsp;
        </div>
        <div style="background-color: #33af93">
            <input value="<?=$userInformation['username']?>" name="edit_username">
        </div>

        <div style="background-color: #33af93">
            &nbsp;
        </div>
        <div style="background-color: #33af93">
            <input value="<?=$userInformation['password']?>" name="edit_password">
        </div>

        <div style="background-color: #33af93">
            &nbsp;
        </div>

        <div style="background-color: #33af93">
            change profile
            <input type="file" name="edit_file">
        </div>

        <div style="background-color: #33af93">
            &nbsp;
        </div>
        <div style="background-color: #33af93" >
            <input type="submit" class="btn" >
        </div>

    </form>


</div>
<script>
    $(function () {
        $(document).on('click','.cancel',function () {
            location.href="/telegram/home";
        });
    });
</script>