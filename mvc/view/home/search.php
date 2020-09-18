<?foreach ($infos as $info){?>
    <div class="search" data-id="<?=$info['userId']?>">
    <img style="position: absolute;left:0;width: 30px;height: 30px;border-radius: 20%;top: 5px" src="/telegram/<?=$info['profileImage']?>" alt="">
    <b><?=$info['name']?></b><br><i>@<?=$info['username']?></i>
    </div>
<?}?>
