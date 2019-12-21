let user = JSON.parse($("#user").text());

window.Echo.channel(`auctions`).notification((notification) => {
    console.log(notification);
    sessionStorage.setItem("notification", notification.auction.id);
});
if(sessionStorage.notification) {
    $("#message").append(sessionStorage.notification);
    sessionStorage.removeItem("notification");
}
