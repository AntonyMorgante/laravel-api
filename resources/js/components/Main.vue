<template>
    <div>
        <ul>
            <li v-for="(post,index) in posts" :key="index">
                {{post.content}}
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "Main",
    data (){
        return {
            posts: []
        }
    },
    created(){
        axios
        .get("/api/posts")
        .then((data)=>{    
            this.posts = data.data.data;
        })
    }
}
</script>