<template>
    <div>
        <h1>Post List</h1>
        <o-button label="Primary" variant="primary">Click Me</o-button>

        <o-table :data="posts.data" :loading="isLoading">
            <o-table-column file="id" label="ID" v-slot="p">
                {{ p.row.id }}
            </o-table-column>
            <o-table-column file="title" label="title" v-slot="p">
                {{ p.row.title }}
            </o-table-column>
            <o-table-column file="posted" label="posted" v-slot="p">
                {{ p.row.posted }}
            </o-table-column>
            <o-table-column file="category_id" label="Category" v-slot="p">
                {{ p.row.category.title }}
            </o-table-column>
        </o-table>

        <o-pagination
            v-if="posts && posts.data && posts.data.length > 0"
            @change="updatePage"
            :total="posts.total"
            v-model:current="currentPage"
            :range-before="2"
            :range-after="2"
            size="small"
            :simple="false"
            :rounded="true"
            :per-page="posts.per_page"
        />
    </div>
</template>

<script>
export default {
    data() {
        return {
            posts: [],
            isLoading: true,
            currentPage: 1,
        };
    },

    mounted() {
        console.log("Contenido de posts:", this.posts);
        this.listPage();
    },
    methods: {
        updatePage() {
            setTimeout(()=> {
                this.listPage()
            },100);
        },
        listPage() {
            console.log(this.currentPage)
            this.isLoading = true;
            this.$axios
                .get("/api/post?page=" + this.currentPage)
                .then((res) => {
                    console.log("Respuesta completa de la API:", res.data);
                    if (Array.isArray(res.data.data)) {
                        this.posts = res.data; // Guardamos todo el objeto
                    } else {
                        console.error(
                            "⚠️ Error: la API no devolvió un array en 'data'.",
                            res.data
                        );
                    }
                    this.isLoading = false;
                })
                .catch((error) => {
                    console.error("Error al obtener los posts:", error);
                    this.isLoading = false;
                });
        },
    },
};
</script>
