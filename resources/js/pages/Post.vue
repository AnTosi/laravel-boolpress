<template>
    <div>
        <img :src="'/storage/' + post.image" alt />
        <div class="card-body">
            <h3>Cane {{ post.title }}</h3>
        </div>
    </div>
</template>

<script>import Axios from "axios"

export default {

    data() {
        return {
            post: null
        }
    },
    mounted() {
        // Call the api for the single post
        Axios.get('/api/posts/' + this.$route.params.slug).then(resp => {
            console.log(this.$route.params.slug);
            console.log(resp);
            this.post = resp.data;
        })
    }

}
</script>

<style>
</style>