<?
AddEventHandler("main", "OnEpilog", "ShowError404");
function ShowError404() {
    if (CHTTP::GetLastStatus()=='404 Not Found') {
        LocalRedirect("/404.php", true, '301 Moved Permanently');    
    }
}
?>