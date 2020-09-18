<div class="memberform">
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
</div>