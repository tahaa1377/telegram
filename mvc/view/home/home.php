 <div class="board">
    <ul class="inactive nav1">
        <li><a href="/telegram/editProfile">Edit profile</a></li>
        <li><a href="#">meesage</a></li>
        <li><a href="#">about</a></li>
        <li><a href="/telegram/logout">Exit</a></li>
    </ul>

    <span class="nav navBtn">
<span class="icon- icon-windows8"></span>
</span>

    <div class="member">
        <?foreach ($resultMembers as $resultMember){?>
<div class="show_memners" data-id="<?=$resultMember['userId']?>">
<div >
    <img class="Img" src="/telegram/<?=$resultMember['profileImage']?>" alt="">
</div>
    <div class="names">
        <b><?=$resultMember['name']?></b>
    </div>
</div>
        <?}?>
    </div>
    <div class="chat">
<div class="chat_top">
    <input placeholder="username" style="position: absolute;right: 0;top: 5px" class="addNew"><br><br>

    <div>
        <div style="position: absolute;right: 0" class="result"></div>
    </div>
</div>
        <div class="chat_middel">

        </div>

        <div class="chat_bottom">

        </div>
    </div>
</div>
<script src="/telegram/asset/js/members.js?ha"></script>
