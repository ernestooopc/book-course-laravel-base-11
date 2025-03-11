<template>

    <!-- <router-link :to="{name:'save'}">Create</router-link> -->

    <o-modal v-model:active="confirmDeleteAction">
        <div class="p-4">
        <p>Seguro que quieres eliminar el registro?</p>
        </div>
        <div class="flex flex-row-reverse gap-2 bg-gray-100 p-3">
            <o-button variant="danger" @click="deletePost">Delete</o-button>
            <o-button variant="info" @click="confirmDeleteAction=false">Cancelar</o-button>

        </div>

    </o-modal>


    <h1 class="text-4xl mb-3">Post List</h1>
    <div class="mb-5"></div>

    <o-button label="Primary" variant="primary" iconLeft="plus" @click="$router.push({name: 'save'})">Create</o-button>

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

            <o-table-column file="category_id" label="Actions" v-slot="p">
                <o-button class="mr-3" variant="warning"><router-link :to="{name:'save', params:{'slug':p.row.slug}}">Edit</router-link></o-button>
                <o-button iconLeft="delete" variant="danger" size="small" rounded @click="deletePostRow= p; confirmDeleteAction=true">Delete</o-button>
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
</template>

<script>
export default {
    data() {
        return {
            posts: [],
            isLoading: true,
            currentPage: 1,
            confirmDeleteAction:false,
            deletePostRow: ''
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
        deletePost(){
            this.confirmDeleteAction = false


            this.$oruga.notification.open({
                message: 'Delete Success',
                position: 'bottom-right',
                variant:'danger',
                duration: 4000,
                //closable:true


            })
            this.$axios.delete('/api/post/'+this.deletePostRow.row.id)
            this.posts.data.splice(this.deletePostRow.index,1)

        }
    },
};
</script>
