<template>
<div class="articles-list">
    <p v-if="failed">Request failed</p>
    <p v-else-if="isLoading">Loading...</p>
    <div v-else>
        <div class="post-preview" v-for="item in articles">
            <a :href="'/article/'+item.post_name">
                <h2 class="post-title"> {{ item.post_title }}</h2>
                <div>
                    <img :src="item.image_file"/>
                    <p class="post-subtitle">
                        {{ item.post_content }}
                    </p>
                </div>
            </a>
            <p class="post-meta">Posted by {{ item.author_name }} on {{ item.created_at }}</p>
        </div>
        <hr/>
    </div>
</div>
</template>
<script>
    export default {
        name:"home",
        data() {
            return {
                isLoading: false,
                failed: false,
                articles: []
            }
        },
        mounted () {
            this.isLoading = true;
            $.ajax({
                method: 'GET',
                dataType:'json',
                url: '/home'
            })
            .done(data => {
                this.isLoading = false;
                this.articles = data;
            })
            .fail((xhr, status, error) => {
                this.loading = false
                this.failed = true
            })
        }
    }
</script>