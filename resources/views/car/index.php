<!DOCTYPE html>
<html lang="en">
<title>Popup Login and Register</title>
<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
<link type="text/css" rel="stylesheet" href="css/style2.css" />

<body>

<!--kode for popypboks med info -->
<div class="container">
    <a id="modal_trigger" href="#modal" class="btn">Click here to Login or register</a>

    <div id="modal" class="popupContainer" style="display:none;">
        <header class="popupHeader">
            <span class="header_title">Informasjon</span>
            <span class="modal_close"><i class="fa fa-times"></i></span>
        </header>

        <section class="popupBody">
            <!-- Social Login -->
            <div class="social_login">

                <div class="centeredText">
                    <span>Her er det info om en bil etc</span>
                </div>

            </div>


        </section>
    </div>
</div>  <!--slutt på kode for popupboks med info -->

<!-- script for popupboksen -->
<script type="text/javascript">
    $("#modal_trigger").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });
</script>
<!-- slutt script for popupboksen -->


</body>
</html>