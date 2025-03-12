<template lang="">
    <div>
        <h1>App</h1>
        <router-view></router-view>
    </div>
</template>
<script>
export default {
    data(){
        return{
            urls:{
                postUpload:"/api/post/upload/",
                postPatch:"/api/post/",
                postPost:"/api/post/",
                postPaginate:"/api/post/",
                postDelete:'/api/post/',
                getPostBySlug:"/api/post/slug/",
                getCategoriesAll:"api/category/all"


            }
        }
    }
}
</script>
