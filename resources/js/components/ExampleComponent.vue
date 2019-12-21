<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body" v-model="message">
                        @{{message}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            message = 'test';
        },
        mounted() {
            window.Echo.channel(`auctions`).notification((notification) => {
                console.log(notification);
                sessionStorage.setItem("notification", notification.auction.id);
            });
        }
    }
</script>
