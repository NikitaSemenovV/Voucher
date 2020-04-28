<?php include_once "const.php";
$dt = date("d.m.y H:i");
$msg = <<<MAIL
<h1>Подтверждение заказа</h1>
<p>{$dt}</p>
<h2>Тип тура</h2>
<p>{$type[$setType][0]}</p>
<h2>Основная страна пребывания</h2>
<p>{$country[$setType][$setCountry][0]}</p>
<h2>Контактная информация</h2>
<p>{$setCont["name"]}, {$setCont["tel"]} - {$setCont["mail"]}</p>
MAIL;
function sendMail($to, $subject = '(No subject)', $message = '', $t) {
      $subject = "=?UTF-8?B?".base64_encode($subject)."?=";

      $headers = 
               "MIME-Version: 1.0" . "\r\n" . 
               "Content-type: text/html; charset=UTF-8" . "\r\n"; 
	$message .= "<p>Финальная стоимость - ".$t." руб</p>";
     return mail($to, $subject, $message, $headers); 
}

function write($msg, $t)
{
    try {
        $handler = fopen("basket.txt", "w");
        $msg .= "<p>Финальная стоимость - ".$t." руб</p>";
        fwrite($handler, $msg);
        fclose($handler);
        return true;
    } catch (Exception $e) {
        return false;
    }
}
?>
<html>
<head>
    <title>Работа</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
</head>

<body topmargin="0" bottommargin="0" rightmargin="0" leftmargin="0" background="../images/back_main.gif">
<table cellpadding="0" cellspacing="0" border="0" align="center" width="583" height="614">
    <tr>
        <td valign="top" width="583" height="208" background="../images/row1.gif">
            <div style="margin-left:88px; margin-top:57px "><img src="../images/w1.gif"></div>
            <div style="margin-left:50px; margin-top:69px ">
                <a href="../index.php">Главная<img src="../images/m1.gif" border="0"></a>
                <img src="../images/spacer.gif" width="20" height="10">
                <a href="order.php">Заказ<img src="../images/m2.gif" border="0"></a>
                <img src="../images/spacer.gif" width="5" height="10">
                <a href="basket.php">Корзина<img src="../images/m3.gif" border="0"></a>
                <img src="../images/spacer.gif" width="5" height="10">
                <a href="index-3.php">О компании<img src="../images/m4.gif" border="0"></a>
                <img src="../images/spacer.gif" width="5" height="10">
                <a href="index-4.php">Контакты<img src="../images/m5.gif" border="0"></a>
                </form>
            </div>
        </td>
    </tr>
    <tr>
        <td valign="top" width="583" height="338" bgcolor="#FFFFFF">
            <?php if (isset($_COOKIE["login"], $_COOKIE["password"])): ?>
            <table cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td valign="top" height="338" width="42"></td>
                    <td valign="top" height="338" width="492">
                        <table cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td width="492" valign="top" height="106">

                                    <div style="margin-left:1px; margin-top:2px; margin-right:10px "><br>
                                        <div style="margin-left:5px "><img src="../images/1_p1.gif" align="left">
                                        </div>
                                        <div style="margin-left:95px "><font class="title">Турагентство</font><br>


                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="492" valign="top" height="232">
                                    <table cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <div valign="top" height="232" width="248">
                                                <div style="margin-left:6px; margin-top:2px; "><img
                                                            src="../images/hl.gif"></div>
                                                <div style="margin-left:6px; margin-top:7px; "><img
                                                            src="../images/1_w2.gif"></div>

                                            </div>
                                            <div style="margin-top:6px; margin-left:6px ">
                                                <table border="1px solid #7C994A" cellpadding="0" cellspacing="0"
                                                       border="0" align="center">
                                                    <tr>
                                                        <td>
                                                            <div>Имя</div>
                                                        </td>
                                                        <td colspan="3">
                                                            <div><?php echo $setCont['name']; ?></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div>Телефон</div>
                                                        </td>
                                                        <td colspan="3">
                                                            <div><?php echo $setCont['tel']; ?></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div>E-mail</div>
                                                        </td>
                                                        <td colspan="3">
                                                            <div><?php echo $setCont['mail']; ?></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div>Тип путевки</div>
                                                        </td>
                                                        <td>
                                                            <div> <?= $type[$setType][0]?> </div>
                                                        </td>
                                                        <td>
                                                            <div> <?php echo $type[$setType][1]; $total = $type[$setType][1]; ?></div>
                                                        </td>
                                                        <td>
                                                            <div><?= $type[$setType][2] ?></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div>Страна основного пребывания</div>
                                                        </td>
                                                        <td>
                                                            <div><?php $cnt = $country[$setType][$setCountry]; $total += $cnt[1]; echo $cnt[0]; ?></div>
                                                        </td>
                                                        <td colspan="2">
                                                            <div><?= $cnt[1] ?> </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div>Вид питания</div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <?= $food[$setFood][0] ?>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <?php echo $food[$setFood][1]; $total += $food[$setFood][1] * (int)$setDay; ?>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <?= $food[$setFood][2] ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div>Дополнительные услуги - <?= $key ?></div>
                                                        </td>
                                                        <td>
                                                            <?php $wrDop = $dop[$key]; 
                                                            $apr = [];
                                                            for ($i=0; $i < count($wrDop); $i++)
                                                                if ($setDop & (1 << $i)){
                                                                  echo "<div>".$wrDop[$i][0]."</div>";
                                                                    $apr[] = $i;
                                                                }
                                                            ?>
                                                        </td>
                                                        <td colspan="2">
                                                            <?php 
                                                                foreach ($apr as $value) {
                                                                    echo "<div>".$wrDop[$value][1]."</div>";
                                                                    $total += (int) $wrDop[$value][1];
                                                                }
                                                            ?>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <div>Количество дней</div>
                                                        </td>
                                                        <td colspan="3">
                                                            <div><?= $setDay; ?></div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>


                                            <td valign="top" height="215" width="1" background="../images/tal.gif"
                                                style="background-repeat:repeat-y"></td>
                                            <td valign="top" height="215" width="243">
                                                <div style="margin-left:22px; margin-top:2px; "><img
                                                            src="../images/hl.gif"></div>
                                                <div style="margin-left:22px; margin-top:7px; ">
                                                    <h4>Итоговая сумма:</h4> <?= $total ?> руб.
                                                    <br><br><br><br>
                                                    <div style="margin-left:67px; margin-top:7px; margin-right:10px ">
                                                        <img src="../images/pointer.gif"><a href="#"><img
                                                                    src="../images/read_more.gif" border="0"></a>
                                                    </div>
                                                </div>
                                                <div style="margin-left:22px; margin-top:16px; "><img
                                                            src="../images/hl.gif"></div>
                                                <div style="margin-left:22px; margin-top:7px; "><img
                                                            src="../images/1_w4.gif"></div>
                                                <div style="margin-left:22px; margin-top:9px; ">
                                                </div>
                                                </div>

                                                <div style="margin-left:10px; margin-top:50px; margin-right:10px ">
                                                    <form method="POST">
                                                        <input type="submit" name="mail"
                                                               value="Отправить на почту и записать в файл"/>
                                                        <br><br>
                                                        <input type="submit" name="write" value="Записать в файл"/>
                                                    </form>
                                                    <?php
                                                    if (isset($_REQUEST['mail'])) {
                                                        if (sendMail($setCont["mail"], "Новая путевка", $msg, $total) && write($msg, $total)) {
                                                            echo "Отправлено";
                                                        } else {
                                                            echo "Error";
                                                        }
                                                    } elseif (isset($_REQUEST['write'])) {
                                                        if (write($msg, $total)) {
                                                            echo "Записано в файл";
                                                        } else {
                                                            echo "Error";
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td valign="top" height="338" width="49"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td valign="top" width="583" height="68" background="../images/row3.gif">
                        <div style="margin-left:51px; margin-top:31px ">

                            <a href="#"><img src="../images/p1.gif" border="0"></a>
                            <img src="../images/spacer.gif" width="26" height="9">
                            <a href="#"><img src="../images/p2.gif" border="0"></a>
                            <img src="../images/spacer.gif" width="30" height="9">
                            <a href="#"><img src="../images/p3.gif" border="0"></a>
                            <img src="../images/spacer.gif" width="149" height="9">
                            <a><input value="Сменить пользователя" type="button"
                                                         onclick="location.href='../index.php'"/></a>

                        </div>
                    </td>
                </tr>
    <?php endif; ?>
            </table>
</body>
</html>