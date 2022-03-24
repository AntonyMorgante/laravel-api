<template>
    <div>
        <ul>
            <li v-for="(post,index) in posts" :key=index>

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

    }
}
</script>