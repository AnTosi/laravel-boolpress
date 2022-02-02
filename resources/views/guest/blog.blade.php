@extends('layouts.app')

@section('content')

<div class="container">
    <h1> My Blog</h1>
    
    
    <div class="card text-left" v-for="post in posts">
        <img class="card-img-top" :src="'/storage/' + post.image" alt="">
        <div class="card-body">
            <h4 class="card-title">@{{post.title}}</h4>
            <p class="card-text">@{{post.body}}</p>
            <p v-if="post.category">@{{post.category.name}}</p>
            <template v-if="post.tag">
                <p v-for="tag in post.tags">
                    @{{tag.name}}
                </p>
            </template>
        </div>
    </div>

</div>
@endsection