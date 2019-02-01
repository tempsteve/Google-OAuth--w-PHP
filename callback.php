<?php
if (isset($_GET["id_token"])) {
    $token = $_GET["id_token"];
    $json = file_get_contents("https://www.googleapis.com/oauth2/v3/tokeninfo?id_token=".$token);
    //Get a JSON from response
    $result = json_decode($json);

    //Because the default scope is email, so we'll get the email from user's Google account
    $account = $result->email;
}
?>
<script lang="javascript">
if (window.location.hash) {
    //Google will response an id_token to the callback page, then use Javascript to redirect again and decode the JSON id_token
    var hash = window.location.hash;
    var split = hash.split("=");
    window.location = "./callback.php?id_token=" + split[1];
}
</script>
