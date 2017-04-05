<?php use yii\helpers\Html; ?>
<?php use yii\helpers\BaseUrl; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Padrão Next4</title>
  <style type="text/css">
  body {
   padding-top: 0 !important;
   padding-bottom: 0 !important;
   padding-top: 0 !important;
   padding-bottom: 0 !important;
   margin:0 !important;
   width: 100% !important;
   -webkit-text-size-adjust: 100% !important;
   -ms-text-size-adjust: 100% !important;
   -webkit-font-smoothing: antialiased !important;
 }
 .tableContent img {
   border: 0 !important;
   display: block !important;
   outline: none !important;
 }
 a{
  color:#382F2E;
}

p, h1{
  color:#382F2E;
  margin:0;
}
p{
  text-align:left;
  color:#999999;
  font-size:14px;
  font-weight:normal;
  line-height:19px;
}

a.link1{
  color:#382F2E;
}
a.link2{
  font-size:16px;
  text-decoration:none;
  color:#ffffff;
}

h2{
  text-align:left;
   color:#222222;
   font-size:19px;
  font-weight:normal;
}
div,p,ul,h1{
  margin:0;
}

.bgBody{
  background: #ffffff;
}
.bgItem{
  background: #ffffff;
}

.item-header{

}
</style>
<script type="colorScheme" class="swatch active">
{
"name":"Default",
"bgBody":"ffffff",
"link":"382F2E",
"color":"999999",
"bgItem":"ffffff",
"title":"222222"
}
</script>
</head>
<body paddingwidth="0" paddingheight="0"   style="padding-top: 0; padding-bottom: 0; padding-top: 0; padding-bottom: 0; background-repeat: repeat; width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;" offset="0" toppadding="0" leftpadding="0">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableContent bgBody" align="center"  style='font-family:Helvetica, Arial,serif;'>


  <tr><td height='35'></td></tr>

  <tr>
    <td>
      <table width="600" border="0" cellspacing="0" cellpadding="0" class='bgItem'>
        <tr>
          <td width='40'></td>
          <td width='520'>
            <table width="520" border="0" cellspacing="0" cellpadding="0" align="center">

<!-- =============================== Header ====================================== -->



<!-- =============================== Body ====================================== -->

              <tr>
                <td class='movableContentContainer' valign='top'>
                  <div lass='movableContent'>
                    <table width="520" border="0" cellspacing="0" cellpadding="0" align="center">
                      <tr>
                        <td valign='top' align='center'>
                          <div class="contentEditableContainer contentTextEditable">
                            <div class="contentEditable  item-header" style="padding:20px; background-color: #273955;" >
                              <p style='text-align:center;margin:0;font-family:Georgia,Time,sans-serif;font-size:26px;color:#fff;'>
                               <span style='color:#289CDC;'>Amor</span>Meu
                              </p>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </table>
                  </div>

                  <div class='movableContent'>
                    <table width="520" border="0" cellspacing="0" cellpadding="0" align="center">
                      <tr><td height='55'></td></tr>
                      <tr>
                        <?php if(isset($titulo)): ?>
                          <td align='left'>
                            <div class="contentEditableContainer contentTextEditable">
                              <div class="contentEditable" align='center'>
                                <h2><?=$titulo?></h2>
                              </div>
                            </div>
                          </td>
                        <?php endif; ?>
                      </tr>

                      <tr>
                        <td height='15'> </td>
                      </tr>

                      <tr>
                        <td align='left'>
                          <div class="contentEditableContainer contentTextEditable">
                            <div class="contentEditable">
                              <?php if (isset($dados)): ?>
                                <?php foreach($dados as $name => $value): ?>
                                  <b><?=$name;?> :</b><?=$value; ?><br />
                                <?php endforeach; ?>
                              <?php endif; ?>

                              <?php if (isset($mensagem)): ?>
                                <div><?=$mensagem?></div>
                              <?php endif; ?>

                            </div>
                          </div>
                        </td>
                      </tr>

                      <tr><td height='55'></td></tr>
                    </table>
                  </div>

                  <div lass='movableContent'>
                    <table width="520" border="0" cellspacing="0" cellpadding="0" align="center">
                      <tr><td height='65'></td></tr>
                      <tr><td  style='border-bottom:1px solid #DDDDDD;'></td></tr>

                      <tr><td height='25'></td></tr>
                      <tr>
                        <td>
                          <table width="520" border="0" cellspacing="0" cellpadding="0" align="center">
                            <tr>
                              <td valign='top' align='left' width='370'>
                                <div class="contentEditableContainer contentTextEditable">
                                  <div class="contentEditable" align='center'>

                                  </div>
                                </div>
                              </td>

                              <td valign='top' align='left' width='370'>
                                <div class="contentEditableContainer contentTextEditable">
                                  <div class="contentEditable" align='center'>
                                    <p  style='text-align:right;color:#333;font-size:12px;font-weight:normal;line-height:20px;'>
                                      <span style='font-weight:bold;'>AmorMeu - Online</span>
                                      <a target='_blank' href="site">www.amormeu.com.br</a><br>
                                    </p>
                                  </div>
                                </div>
                              </td>

                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </div>
                </td>
              </tr>
<!-- =============================== footer ====================================== -->



            </table>
          </td>
          <td width='40'></td>
        </tr>
      </table>
    </td>
  </tr>

  <tr><td height='88'></td></tr>


</table>

  </body>
  </html>