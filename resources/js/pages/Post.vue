<template>
    <div class="container">
        <img :src="'/storage/' + post.image" alt />
        <div class="">
            <h3>{{ post.title }}</h3>
            <p> {{post.body}}</p>
            <template v-if="post.category">Category: 
                <p>@{{post.category.name}}</p>
            </template>
            <template v-if="post.tags">
                Tags:
                <p>
                    <span v-for="tag in post.tags" :key="tag.slug">
                    @{{tag.name}}
                    </span>
                </p>
            </template>
        </div>
    </div>
</template>

<script>
import Axios from "axios"

export default {

    data() {
        return {
            post: null
        }
    },
    mounted() {
        console.log('componente montato');
        // Call the api for the single post
        Axios.get('/api/posts/' + this.$route.params.slug).then(resp => {
            // console.log(this.$route.params.slug);
            console.log(resp);
            this.post = resp.data.data;

        })
        .catch (error =>{
            console.log('oops');
        })
    }

}
</script>

<style>
</style>