<template>
<div class="col-lg-9">
    <div class="panel">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-11">
                    <div class="media" v-for="post in posts">
                        <div class="media-left media-middle">
                            <a href="#">
                                <img width="50" class="media-object" src="//www.gravatar.com/avatar/79546ee47756b679f7f314b894d0c1ed?s=100&d=https%3A%2F%2Flaracasts.s3.amazonaws.com%2Fimages%2Fgeneric-avatar.png" alt="...">
                            </a>
                        </div>
                        <div class="media-body">
                            <a href="">
                                <h4 class="media-heading">{{ post.title }}</h4>
                            </a>
                            <small>
                                <span>
                                    <a class="btn-link">{{ post.channel.name }}</a>
                                    Created By
                                    <a href="" class="btn-link">{{ post.user.name }}</a>
                                </span>
                            </small>
                            <p>
                                <small>{{ post.body }}</small>
                            </p>
                        </div>
                        <div class="media-right media-middle">
                            <h1>{{ post.total_replies }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        data () {
          return {

          }
        },

        props : ['posts'],

        methods : {

        }
    }
</script>
