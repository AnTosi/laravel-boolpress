<template>
    <section class="blog">
        <div class="row flex-wrap">
            <div class="col-3 p-2" v-for="post in posts" :key="post.slug">
                <div class="card">
                    <img class="card-img-top" :src="'/storage/' + post.image" alt="" v-if="'/storage/' + post.image">
                    <div class="card-body">
                        <h4 class="card-title">@{{post.title}}</h4>
                        <p v-if="post.category">Category: @{{post.category.name}}</p>
                        <template v-if="post.tags">
                            <p>Tags:</p>
                            <span v-for="tag in post.tags" :key="tag.slug">
                                @{{tag.name}}
                            </span>
                        </template>
                        <div>
                            <router-link :to="'/blog/' + post.slug">View Post</router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    data() {
        return {
            loading: true,
            posts: null,
        };
    },
    mounted() {
        axios.get("api/posts").then((response) => {
            // console.log(response);
            this.posts = response.data.data;
            this.meta = response.data.meta;
            this.links = response.data.links;
            this.loading = false;
        });
        // console.log("Component mounted.");
        // console.log(this.meta);
    },
};
</script>