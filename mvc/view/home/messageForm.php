<?foreach ($messages as $message){?>
    <?if($message['messageFrom'] == $_SESSION['userId']){?>

            <?if($message['message'] != null){?>
            <div class="right">
            <?=$message['message']?>
            </div>
            <?}?>
            <br>
            <?if($message['messageImage'] != null){?>
            <div>
                <img style="width: 140px;height: 140px;position: absolute;right: 7px" src="/telegram/<?=$message['messageImage']?>" alt="">
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
        <?}?>
        <br>
        <br>
        <br>
    <?}else{?>

            <?if($message['message'] != null){?>
            <div class="left">
                <?=$message['message'];?>
            </div>
            <?}?>

            <br>
            <?if($message['messageImage'] != null){?>
                <div>
                    <img style="width: 140px;height: 140px;position: absolute;left: 7px;" src="/telegram/<?=$message['messageImage']?>" alt="">
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
            <?}?>

        <br>
        <br>
        <br>
    <?}
}?>