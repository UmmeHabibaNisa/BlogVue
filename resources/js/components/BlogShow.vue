<template>
    <div class="container">
        <br><br>
         <a type="button" href="/admin" class="btn btn-dark">Home</a>

        <div class="row justify-content-center">
            <div class="col-md-8">
            <h3>{{title}}</h3>
            <p>{{description}}</p>
            <img v-bind:src="'/upload/'+ image" class="img-fluid" alt="Responsive image"><br><br>
             <a v-show="!edit" type="button"  class="btn btn-dark">Edit</a>
                <a v-show="edit" type="button"  class="btn btn-dark" @click="updateBlog">Update</a>
            <a type="button" @click="deleteBlog(id)" class="btn btn-dark">Delete</a>
            <br><br>
            </div>
        </div>

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
                edit:false
            }
        },
        mounted() {
            const urlParams = new URLSearchParams(window.location.search);
              this.id = urlParams.get('id');
             this.showblog(this.id);
            // console.log('Component mounted.')
        },
        methods:{
             showblog(id) {
                axios.get("/api/blog/" +id).then(response => {
                    this.list = response.data;
                    console.log(response.data);
                    this.title = response.data.title;
                    this.description = response.data.description;
                    this.image = response.data.image;
                }).catch(err => {
                    console.log(err);
                })
            },
            // editBlog() {
            //     this.id=todo.id;
            //     this.edit = true;
            //     this.title = blog.title
            // },
              deleteBlog(id) {
                axios.delete('/api/blog/' +id)
                    .then(response => {
                        window.location.href = "/home"
                       /* {id : this.id})*/
                    });


            },

            updateBlog(){
                axios.put("/api/blog/"  + this.id, {title: this.title, description: this.description }).then(response => {
                    this.title = '';
                    this.description='';
                    this.edit= false;
                    window.location.href = "/admin"
                }).catch(err => {
                    console.log(err);
                })

            },
        }

    }
</script>
