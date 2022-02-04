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
        <div class="text-center">
            <span class="btn text-muted" @click="prevPage()" v-if="links.prev">Prev</span>
            <span class="btn" :class="pageN === meta.current_page ? 'btn-primary text-white' : 'text-muted'" v-for="pageN in meta.last_page" :key="pageN.id" @click="goToPage(pageN)">{{ pageN }}</span>
            <span class="btn text-muted" @click="nextPage()" v-if="links.next">Next</span>
        </div>
    </section>
</template>

<script>
export default {
    data() {
        return {
            loading: true,
            posts: [],
            meta: [],
            links: [],
            baseUrl: "/api/posts",
        };
    },

    methods: {
        
        fetchPosts(url){
            axios.get(url).then((response) => {
            // console.log(response);
            this.posts = response.data.data;
            this.meta = response.data.meta;
            this.links = response.data.links;
            this.loading = false;
        })
        },

        prevPage(){
            this.fetchPosts(this.links.prev)
        },

        nextPage(){
            this.fetchPosts(this.links.next)
        },

        goToPage(pageN){
            this.fetchPosts(this.baseUrl + '?page=' + pageN)
        }

    },

    mounted() {
        
        // console.log("Component mounted.");
        // console.log(this.meta);
        // console.log(this.baseUrl);
        this.fetchPosts(this.baseUrl);
    },
};
</script>