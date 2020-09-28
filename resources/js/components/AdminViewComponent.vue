<template>
    <div class = "container">
        <div >
            <a type="button" href="/newBlog" class="btn btn-dark">Add New Blog</a><br><br>
        </div>
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col"></th>


            </tr>
            </thead>
            <tbody v-for="(blog, index) in list" v-bind:key="index">
            <tr>
                <td>{{blog.title}}</td>
                <td>{{blog.description}}</td>
                <td >
                    <img v-bind:src="'/upload/'+ blog.image" class="card-img-top size" >
                </td>

                <td>

                    <router-link :to="{ name: 'edit' , params: { id: blog.id } }"  class="btn btn-dark">Edit</router-link>

                    <a type="button" @click="deleteBlog(blog.id)" class="btn btn-dark">Delete</a>
                </td>
            </tr>
            </tbody>
        </table>
    <!--   <div class="modal" tabindex="-1" role="dialog" id="myModal"  >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Do you want to edit it?</h5>
                        &lt;!&ndash;<h5 class="modal-title">edit</h5>&ndash;&gt;
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    &lt;!&ndash;<div class="modal-body">

                        <p>dfgfdg</p>
&lt;!&ndash;                        <img v-bind:src="'/upload/'+ blog.image" class="card-img-top size" >&ndash;&gt;
                    </div>&ndash;&gt;
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>-->

        <router-view></router-view>

    </div>
</template>

<script>


    export default {

        data(){
            return{
                title:'',
                description:'',
                image:'',
                category:'',
                list:{},
                id:'',



            }
        },
        mounted() {
            this.allBlog();
            console.log('Component mounted.')
        },
        methods:{
            allBlog() {
                axios.get("/api/blogs").then(response => {
                    this.list = response.data;

                }).catch(err => {
                    console.log(err);
                })
            },

            deleteBlog(id) {
                axios.delete('/api/blog/'+ id)
                    .then(response => {
                        this.allBlog();
                    });
            },
            /*showModal(blog){
               console.log(this.id);
                $(this.id).modal('show');
            },*/




        }

    }
</script>

<style scoped>
    img.card-img-top.size {
        height: 82px;
        width: 190px;
    }
</style>
