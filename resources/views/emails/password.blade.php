    <?PHP
    $lan = $_POST['lan'];
    $add = "";
            if($lan != "" && ($lan == "en" || $lan == "no" || $lan == "est")){
                $add = "?lan=" . $lan;
                ?>
                {{App::setLocale($lan)}}
                <?PHP
            }
?>
                {{trans('general.resetPassword')}} <a href="{{ url('password/reset/'.$token) }}<?PHP echo $add; ?>">{{ url('password/reset/'.$token) }}<?PHP echo $add; ?></a>
                
                </br></br>
                {{trans('general.warning')}}
