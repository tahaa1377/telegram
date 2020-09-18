<div>
    <h1>telegram</h1>
</div>

<div>
    <div class="login">
        <form method="post">
        <ul>
            <li><h1>login</h1></li>
            <li><br></li>
            <li><br></li>
            <li><input name="l_email"  type="email" placeholder="email"><br></li>
            <li><br></li>
            <li><input name="l_password" type="password" placeholder="password"></li>
            <li><br></li>
            <li><input name="l_submit" class="btn" type="submit" ></li>
        </ul>
        </form>
        <br>
        <br>
        <div>
            <?if(isset($error) and !empty($error)){?>
                <span class="error"><?=$error;?></span>
            <?}?>
        </div>
    </div>
    <div>
        <div class="signup">
            <form method="post"  enctype="multipart/form-data">
            <ul>
                <li><h1>signup</h1></li>
                <li><br></li>
                <li><br></li>
                <li><input name="s_name"  placeholder="name"><br></li>
                <li><br></li>
                <li><input name="s_email" type="email" placeholder="email"></li>
                <li><br></li>
                <li><input name="s_password" type="password" placeholder="password"></li>
                <li><br></li>
                <li><input name="s_username" placeholder="username"></li>
                <li><br></li>
                <li><input name="s_img" type="file"></li>
                <li><br></li>
                <li><input name="s_submit" class="btn" type="submit" ></li>
            </ul>
            </form>
            <br>
            <div>
                <?if(isset($error1) and !empty($error1)){?>
                    <span class="error"><?=$error1;?></span>
                <?}?>
            </div>
        </div>
    </div>
</div>